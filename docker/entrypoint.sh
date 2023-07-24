#!/bin/bash

# install composer if not already done
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

# php artisan cache:clear
# php artisan config:clear
# php artisan route:clear
# php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env

exec docker-php-entrypoint "$@"
