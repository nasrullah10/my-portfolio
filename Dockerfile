# Simplified Dockerfile for deploying a Laravel app on Render.com

# Use an official PHP runtime as a parent image
FROM php:8.2-cli

# Install system dependencies needed for Laravel
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container
WORKDIR /var/www

# Copy the application code to the container
COPY . .

# Install PHP dependencies for production, without dev packages
RUN composer install --optimize-autoloader --no-dev

# Set permissions for Laravel's storage and cache directories
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8000 to the outside world
EXPOSE 8000

# Set the command to run the application using Laravel's built-in server.
# This is suitable for free-tier services on platforms like Render.
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
