# Stage 1: Node - Build Vite assets
FROM node:18 as node-builder
WORKDIR /app
COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install && npm run build

# Stage 2: PHP - Laravel
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libzip-dev zip sqlite3 libsqlite3-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Workdir
WORKDIR /var/www

# Copy Laravel source code
COPY . .

# Copy Vite build output
COPY --from=node-builder /app/public/build /var/www/public/build

# Set correct permissions
RUN mkdir -p storage/logs bootstrap/cache \
    && chmod -R 755 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Run Laravel commands
RUN php artisan config:clear \
 && php artisan view:clear \
 && php artisan route:clear \
 && php artisan config:cache \
 && php artisan view:cache \
 && php artisan migrate:fresh --force

# Start the Laravel app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
