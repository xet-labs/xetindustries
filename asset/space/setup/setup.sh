#!/bin/bash

# Install necessary packages
echo "Installing required packages..."
#sudo apt update && sudo apt install -y git nginx keepalived openssl mariadb-server mariadb-client avahi-daemon avahi-utils curl composer php php-mysql php-fpm php-xml php-readline php-common php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip


# Enable and restart services
echo "Enabling and restarting services..."
sudo systemctl enable mariadb nginx php*.service
sudo systemctl restart mariadb nginx php*.service


# Set up Nginx configuration if the file exists
NGINX_CONFIG="/xlvini/asset/proconf/mx/root.d/etc/nginx/sites-available/xi.com.4000"
if [[ -e $NGINX_CONFIG ]]; then
    echo "Configuring Nginx for xi.com.4000..."
    sudo cp $NGINX_CONFIG /etc/nginx/sites-available/xi.com.4000
    sudo ln -sf /etc/nginx/sites-available/xi.com.4000 /etc/nginx/sites-enabled/
    sudo systemctl reload nginx
else
    echo "Nginx configuration file not found: $NGINX_CONFIG"
fi

# Import databases
echo "-Importing databases..."
sudo mysql -u root -p < asset/space/setup/db/XI-setup.db.sql
sudo mysql -u root -p XI < asset/space/setup/db/XI.db.sql


# Switch to the appropriate user (avoiding su issues)
if [ "$(whoami)" != "$LOGNAME" ]; then
    echo "Switching to user: $LOGNAME"
    sudo exec su - "$LOGNAME" -c "$0 --continue"
fi

# Composer setup
echo "Running Composer commands..."
sudo composer install --no-dev --optimize-autoloader
sudo composer update

# Laravel setup
echo "Setting up Laravel..."
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


sudo systemctl stop mariadb nginx php*.service
sleep 5
# Restart services
echo "Restarting services..."
sudo systemctl restart mariadb nginx php*.service

echo "Setup complete!"