# Shutdown the laravel app
# php artisan down

git pull

# Install new composer packages
composer install

# Cache boost configuration and routes
php artisan cache:clear
php artisan config:cache

php artisan migrate --force
php artisan clear-compiled

# Rise from the ashes
# php artisan up

echo 'Deploy finished.'
