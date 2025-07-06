FROM php:8.2-fpm

# Install system dependencies and Node.js 18
RUN apt-get update && apt-get install -y \
    curl gnupg ca-certificates unzip git zip sqlite3 libsqlite3-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev libpq-dev \
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pgsql pdo_sqlite zip gd mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy app code
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader

# Build Vite assets
ENV NODE_ENV=production
RUN npm install && npm run build

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Run Laravel
CMD php artisan config:clear && php artisan migrate:fresh --force && php artisan db:seed && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=8000
