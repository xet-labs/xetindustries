#!/bin/bash
CURRENT_PATH=$(pwd)

function setup_pkg(){
    echo "Installing required packages..."
    apt install -y git nginx keepalived openssl mariadb-server mariadb-client avahi-daemon avahi-utils curl composer php php-mysql php-fpm php-xml php-readline php-common php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip
}

function setup_nginx(){
    NGINX_CONFIG="/xlvini/asset/proconf/mx/root.d/etc/nginx/sites-available/xi.com.4000"
    if [[ -e $NGINX_CONFIG ]]; then
        echo "Configuring Nginx for xi.com.4000..."
        cp $NGINX_CONFIG /etc/nginx/sites-available/xi.com.4000
        ln -sf /etc/nginx/sites-available/xi.com.4000 /etc/nginx/sites-enabled/
        systemctl reload nginx
    else
        echo "Nginx configuration file not found: $NGINX_CONFIG"
    fi
}

function setup_db(){
    echo "-Importing databases..."
    mysql --skip-password < asset/space/setup/db/XI-init.sql
    if ! grep -q "SET foreign_key_checks = 0;" asset/space/setup/db/XI.sql; then
        echo "--applying db patch"
        sed -i '1s/^/SET foreign_key_checks = 0;\n/' asset/space/setup/db/XI.sql
    fi
    sed -i '/\/\*M!999999\\- enable the sandbox mode \*\//d' asset/space/setup/db/XI.sql 


    mysql --skip-password XI < asset/space/setup/db/XI.sql
    mysql --skip-password < asset/space/setup/db/XI-init99.sql
    systemctl restart mysql
}

function setup_composer(){
    if [ "$(id -u)" -eq 0 ]; then
        echo "Switching to www-data user to run Composer..."
        sudo -u www-data composer install --no-dev --optimize-autoloader
        sudo -u www-data composer update
    else
        composer install --no-dev --optimize-autoloader
        composer update
    fi
}

function setup_larvel(){
    # Laravel setup
    echo "-setting up Laravel..."
    if [[ ! -e .env ]]; then
        cp .env.example .env
    else
        echo "Php env file exists, keeping it"
    fi
    php artisan key:generate
    php artisan migrate --force
    php artisan storage:link

    echo "Clearing and caching Laravel configurations..."
    php artisan config:clear
    php artisan config:cache
    php artisan route:clear
    php artisan view:clear
}

function init_services(){
    echo "Enabling and restarting services..."
    systemctl enable nginx mariadb php8.2-fpm.service
    sleep 4
    systemctl restart nginx mariadb php8.2-fpm.service
}
git_pull(){
        if git diff --quiet; then
        echo "No changes detected, pulling latest changes."
        git pull
    else
        echo "Changes detected. Stashing changes."
        git reset --hard HEAD
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
    echo "Perfoming backup"
    mysqldump XI --skip-password  > asset/space/setup/db/XI.sql
    git add -A && git commit -m "stable-bkp $(date)" && git push
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