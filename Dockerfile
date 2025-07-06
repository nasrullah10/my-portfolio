# 1️⃣ Build Vite assets
FROM node:18 as node-builder

WORKDIR /app
COPY package*.json vite.config.js ./
COPY public ./public           # Must exist so Vite can build to public/build
COPY resources ./resources
RUN npm install && npm run build

# 2️⃣ Laravel PHP stage
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

COPY --from=node-builder /app/public/build /var/www/public/build

RUN composer install --optimize-autoloader
RUN chmod -R 755 storage bootstrap/cache

CMD php artisan config:clear && \
    php artisan migrate:fresh --force && \
    php artisan db:seed --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
