#!/bin/bash

git pull && composer dump-autoload && composer install && php artisan cache:clear && php artisan config:clear