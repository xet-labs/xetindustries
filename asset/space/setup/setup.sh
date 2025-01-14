#!/bin/bash
CURRENT_PATH=$(pwd)
dbPath="asset/space/setup/db/XI.sql"

out() { printf "$1$2\e[0m\n"; }
msg() { out "\n\e[1;34m--" "$@"; }
pmsg() { out "\e[1;34m" "$@"; }
inf() { out "\e[0;2m" "$@"; }
inf2() { out "\e[0;2m--" "$@"; }
alert() { out "\e[0;35m" "$@"; }
wrn() { out "\e[0;33m--" "${@} !!"; return 1; }
err() { out "\e[0;31m\n--" "${@} !!"; exit 1; }


function setup_pkg(){
    inf "Installing required packages..."
    apt install -y git nginx keepalived openssl mariadb-server mariadb-client avahi-daemon avahi-utils curl composer php php-mysql php-fpm php-xml php-readline php-common php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip
}

function setup_nginx(){
    NGINX_CONFIG="/xlvini/asset/proconf/mx/root.d/etc/nginx/sites-available/xi.com.4000"
    if [[ -e $NGINX_CONFIG ]]; then
        inf "Configuring Nginx config for site"
        cp $NGINX_CONFIG /etc/nginx/sites-available/xi.com.4000
        ln -sf /etc/nginx/sites-available/xi.com.4000 /etc/nginx/sites-enabled/
        systemctl reload nginx
    else
        wrn "Nginx configuration file not found: $NGINX_CONFIG"
    fi
}

function setup_db(){
    inf "Importing databases"
    mysql --skip-password < asset/space/setup/db/XI-init.sql
    if ! grep -q "SET foreign_key_checks = 0;" asset/space/setup/db/XI.sql; then
        inf2 "applying db patch"
        sed -i '1s/^/SET foreign_key_checks = 0;\n/' asset/space/setup/db/XI.sql
    fi
    sed -i '/\/\*M!999999\\- enable the sandbox mode \*\//d' asset/space/setup/db/XI.sql 

    mysql --skip-password XI < asset/space/setup/db/XI.sql
    mysql --skip-password < asset/space/setup/db/XI-init99.sql
    systemctl restart mysql
}

function setup_composer(){
    if [ "$(id -u)" -eq 0 ]; then
        inf "Switching to www-data user to run Composer..."
        sudo -u www-data composer install --no-dev --optimize-autoloader
        sudo -u www-data composer update
    else
        composer install --no-dev --optimize-autoloader
        composer update
    fi
}

function setup_larvel(){
    # Laravel setup
    inf "setting up Laravel..."
    if [[ ! -e .env ]]; then
        cp .env.example .env
    else
        alert "Php env file exists, keeping it"
    fi
    php artisan key:generate
    php artisan migrate --force
    php artisan storage:link

    inf "Clearing and caching Laravel config..."
    php artisan config:clear
    php artisan config:cache
    php artisan route:clear
    php artisan view:clear
}

function init_services(){
    inf "Enabling and restarting services..."
    systemctl enable nginx mariadb php8.2-fpm.service
    sleep 4
    systemctl restart nginx mariadb php8.2-fpm.service
}
git_pull(){
    inf "fetching latest changes [git]"
    if git diff --quiet; then
        git pull
    else
        alert "Changes detected, discarding em all"
        git reset --hard HEAD
        git clean -fd 
        git pull
    fi
}
function get_update(){

    git_pull
    # setup_pkg
    setup_nginx
    setup_db
    setup_composer
    setup_larvel
}

function get_backup(){
    pmsg "Perfoming bkp"
    mkdir -p "$(dirname "$dbPath")"
    if mysqldump XI --skip-password  > "$dbPath" ; then
        pmsg "DB backed up locally"
        sed -i '/\/\*M!999999\\- enable the sandbox mode \*\//d' "$dbPath"
        pmsg "pushing latest changes [git]"
        git add -A && git commit -m "stable-bkp $(date)" && git push
    else
        wrn "Couldnt backup db"
    fi
}

#-main script
if [[ -e $CURRENT_PATH/asset/space/setup/setup.sh ]]; then
    git config --global --add safe.directory $CURRENT_PATH
    chown www-data:www-data $CURRENT_PATH -R
fi

while [[ $# -gt 0 ]]; do
    case $1 in
        -a|--all|all)
            setup_pkg
            setup_nginx
            setup_db
            setup_composer
            setup_larvel
            init_services

            shift
            ;;
        -b|--backup|backup)
            get_backup
            shift
            ;;
        -u|--update|update)
            get_update
            shift
            ;;
        --git|git)
            git_pull
            shift
            ;;
        --pkg|pkg)
            setup_pkg
            shift
            ;;
        --db|db)
            setup_db
            shift
            ;;
        --composer|composer)
            setup_composer
            shift
            ;;
        --larvel|larvel)
            setup_larvel
            shift
            ;;
        --srvc|srvc|service)
            init_services
            shift
            ;;
        -h|help)
            usage
            exit 0
            ;;
        *)
            alert "Error: Invalid option $1"
            usage
            exit 1
            ;;
    esac
done



if [ $? -eq 0 ]; then
    echo "Setup complete!"
else
    echo "Setup failed!"
fi