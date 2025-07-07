# 1️⃣ Build Vite assets
FROM node:18 as node-builder

WORKDIR /app

# Copy Vite config and dependencies
COPY package*.json vite.config.js ./

# Copy Laravel resources and public directory
COPY public ./public
COPY resources ./resources

# Build Vite assets
RUN npm install && npm run build

# 2️⃣ PHP stage with Laravel
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Add Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy Laravel source code
COPY . .

# ✅ Copy Vite build output AFTER Laravel files
COPY --from=node-builder /app/public/build /var/www/public/build

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-interaction --no-scripts
RUN php artisan package:discover --ansi


# Set correct permissions
RUN chmod -R 755 storage bootstrap/cache

# Run Laravel + PHP dev server
CMD php artisan config:clear && \
    php artisan migrate:fresh --force && \
    php artisan db:seed --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
