# 1️⃣ Build Vite assets
FROM node:18 as node-builder

WORKDIR /app

COPY package*.json vite.config.js ./
COPY public ./public
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

# Install PHP dependencies without scripts
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-scripts

# Set permissions just in case
RUN chmod -R 775 storage bootstrap/cache

# ✅ Add entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Run everything via entrypoint
CMD ["/usr/local/bin/entrypoint.sh"]
