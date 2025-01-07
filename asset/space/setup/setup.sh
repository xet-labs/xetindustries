#!/bin/bash

function setup_pkg(){
    echo "Installing required packages..."
    sudo apt install -y git nginx keepalived openssl mariadb-server mariadb-client avahi-daemon avahi-utils curl composer php php-mysql php-fpm php-xml php-readline php-common php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip
}

function setup_nginx(){
    NGINX_CONFIG="/xlvini/asset/proconf/mx/root.d/etc/nginx/sites-available/xi.com.4000"
    if [[ -e $NGINX_CONFIG ]]; then
        echo "Configuring Nginx for xi.com.4000..."
        sudo cp $NGINX_CONFIG /etc/nginx/sites-available/xi.com.4000
        sudo ln -sf /etc/nginx/sites-available/xi.com.4000 /etc/nginx/sites-enabled/
        sudo systemctl reload nginx
    else
        echo "Nginx configuration file not found: $NGINX_CONFIG"
    fi
}

function setup_db(){
    echo "-Importing databases..."
    sudo mysql -u root -p < asset/space/setup/db/XI-init.sql
    if ! grep -q "SET foreign_key_checks = 0;" asset/space/setup/db/XI.sql; then
        sed -i '1s/^/SET foreign_key_checks = 0;\n/' asset/space/setup/db/XI.sql
    fi
    sudo mysql -u root -p XI < asset/space/setup/db/XI.sql
    sudo mysql -u root -p < asset/space/setup/db/XI-init99.sql
}

function setup_composer(){
    if [ "$(id -u)" -eq 0 ]; then
        echo "Switching to www-data user..."
        su -s /bin/bash www-data
    fi

    # Composer setup
    echo "-setting up Composer..."
    sudo composer install --no-dev --optimize-autoloader
    sudo composer update
}

function setup_larvel(){
    if [ "$(whoami)" != "$LOGNAME" ]; then
        echo "Switching to user: $LOGNAME"
        sudo exec su - "$LOGNAME" -c "$0 --continue"
    fi
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
    sudo systemctl enable nginx mariadb php8.2-fpm.service
    sleep 4
    sudo systemctl restart nginx mariadb php8.2-fpm.service
}

function get_update(){
    git pull
    # setup_pkg
    setup_nginx
    setup_db
    setup_composer
    setup_larvel
}

#-main script


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
        -u|--update|update)
            get_update
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
        --service|service)
            init_services
            shift
            ;;
        -b|b|basedir)
            baseDir="$2"
            shift 2
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