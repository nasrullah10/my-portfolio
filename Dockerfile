# 1️⃣ Node stage for Vite
FROM node:18 as node-builder

WORKDIR /app

# Copy only what's needed for Vite build
COPY package*.json vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY public ./public

# Install dependencies and build Vite assets
RUN npm install && npm run build


# 2️⃣ PHP + Laravel
FROM php:8.2-fpm

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Add Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy Laravel application (excluding Vite build for now)
COPY . .

# ✅ Copy only Vite build and manifest from node-builder
COPY --from=node-builder /app/public/build /var/www/public/build
COPY --from=node-builder /app/public/manifest.json /var/www/public/manifest.json

# Laravel storage and permissions
RUN mkdir -p storage/framework/views storage/framework/cache storage/framework/sessions
RUN chmod -R 755 storage bootstrap/cache

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-scripts

# Laravel boot commands
CMD php artisan config:clear && \
    php artisan view:clear && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
