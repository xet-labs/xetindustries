sudo apt install php php-mysql php-fpm php-xml php-readline php-common php-mcrypt php-gd php-mbstring php-curl php-zip php-cli php-json php-bcmath php-sqlite3 unzip curl composer

sudo mysql -u root -p <asset/space/setup/db/XI.db.sql

composer install
composer update

cp .env.example .env

php artisan key:generate
php artisan migrate

php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan view:clear


 