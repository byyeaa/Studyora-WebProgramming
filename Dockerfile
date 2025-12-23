FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev zip curl \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install \
    pdo pdo_mysql mbstring zip exif pcntl bcmath gd

WORKDIR /app
COPY . .

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Laravel permission
RUN chmod -R 777 storage bootstrap/cache

EXPOSE ${PORT}

CMD php artisan serve --host=0.0.0.0 --port=${PORT}
