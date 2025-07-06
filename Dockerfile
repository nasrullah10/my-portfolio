FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    zip unzip git curl sqlite3 libsqlite3-dev \
    libjpeg-dev libpng-dev libfreetype6-dev libzip-dev libpq-dev \
    nodejs npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Laravel dependencies (include dev dependencies like Faker)
RUN composer install --optimize-autoloader

# Build Vite assets
RUN npm install && npm run build

# Create SQLite DB (optional if using SQLite)
RUN touch /tmp/database.sqlite

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

EXPOSE 8000

# Run Laravel setup
CMD php artisan migrate:fresh --force && php artisan db:seed && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=8000
