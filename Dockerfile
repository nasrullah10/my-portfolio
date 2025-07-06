FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl sqlite3 libsqlite3-dev libonig-dev \
    libjpeg-dev libpng-dev libfreetype6-dev libzip-dev libpq-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP deps
RUN composer install --optimize-autoloader

# Build assets with Vite
ENV NODE_ENV=production
RUN npm install && npm run build

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Laravel config + migrations
CMD php artisan config:clear && \
    php artisan migrate:fresh --force && \
    php artisan db:seed && \
    php artisan config:cache && \
    php artisan serve --host=0.0.0.0 --port=8000
