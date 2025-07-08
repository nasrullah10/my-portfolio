#!/bin/bash

# Create cache folders Laravel needs
mkdir -p storage/framework/{cache,sessions,views}
chmod -R 775 storage bootstrap/cache

# Run Laravel setup commands
php artisan package:discover --ansi
php artisan config:clear
php artisan migrate:fresh --force
php artisan db:seed --force
php artisan config:cache

# Start Laravel
php artisan serve --host=0.0.0.0 --port=8000
