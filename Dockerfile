# 1️⃣ Node stage for Vite
FROM node:18 as node-builder

WORKDIR /app

COPY package*.json vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm install && npm run build

# 2️⃣ PHP + Laravel
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# ✅ Copy full Vite build with manifest
COPY --from=node-builder /app/public /var/www/public

# ✅ Ensure storage path exists
RUN mkdir -p storage/framework/views storage/framework/cache storage/framework/sessions

RUN chmod -R 755 storage bootstrap/cache

RUN composer install --optimize-autoloader --no-scripts

# ✅ Laravel boot commands
CMD php artisan config:clear && \
    php artisan view:clear && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
