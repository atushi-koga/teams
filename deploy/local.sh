#!/usr/bin/bash
php artisan config:clear
php artisan view:clear
php artisan route:clear
composer install
php artisan migrate
npm install
