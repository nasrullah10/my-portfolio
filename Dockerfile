# Node builder stage
FROM node:18 as node-builder
WORKDIR /app
COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install && npm run build

# Laravel app
FROM php:8.2-fpm
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY . .
COPY --from=node-builder /app/public/build /var/www/public/build

RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-scripts
RUN chmod -R 755 storage bootstrap/cache

CMD php artisan config:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan migrate:fresh --force && \
    php artisan db:seed --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
