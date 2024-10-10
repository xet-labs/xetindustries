sudo apt install -y git nginx keepalived openssl mariadb-server mariadb-client avahi-daemon avahi-utils curl composer php php-mysql php-fpm php-xml php-readline php-common php-mcrypt php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip

sudo mysql -u root -p <asset/space/setup/db/XI.db.sql


composer update
composer install

php artisan storage:link

cp .env.example .env
php artisan key:generate
php artisan migrate

php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan view:clear


 