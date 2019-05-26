#!/usr/bin/bash
php artisan config:clear
php artisan view:clear
php artisan route:clear
git pull --rebase origin master
composer install --no-dev
php artisan migrate
php artisan config:cache
php artisan view:cache
sudo chmod -R a+w storage/*
sudo chmod -R a+w bootstrap/cache
