FROM php:8.2-apache

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev zip curl \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install \
    pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Apache modules
RUN a2enmod rewrite \
 && a2dismod mpm_event mpm_worker || true \
 && a2enmod mpm_prefork

# Set workdir
WORKDIR /var/www/html

# Copy app
COPY . .

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Laravel permissions
RUN chmod -R 777 storage bootstrap/cache

# Public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Railway PORT
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf \
 && sed -i 's/:80/:${PORT}/g' /etc/apache2/sites-available/000-default.conf

CMD ["apachectl", "-DFOREGROUND"]
