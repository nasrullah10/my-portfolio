# ──────────────────────────────────────────────
# 1️⃣ Stage: Node to build Vite assets
# ──────────────────────────────────────────────
FROM node:18 AS node-builder

WORKDIR /app
COPY package*.json vite.config.js ./
COPY resources ./resources
RUN npm install && npm run build

# ──────────────────────────────────────────────
# 2️⃣ Stage: PHP + Composer + Laravel app
# ──────────────────────────────────────────────
FROM php:8.2-fpm

# Install PHP system dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel project (except node_modules/build)
COPY . .

# Copy built assets from Node stage
COPY --from=node-builder /app/public/build public/build

# Install PHP dependencies
RUN composer install --optimize-autoloader

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Laravel commands + serve
CMD php artisan config:clear && php artisan migrate:fresh --force && php artisan db:seed && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=8000
