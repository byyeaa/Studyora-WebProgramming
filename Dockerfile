FROM php:8.2-apache

# PAKSA: hapus semua MPM dulu
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load \
 && rm -f /etc/apache2/mods-enabled/mpm_*.conf

# Aktifkan SATU MPM SAJA
RUN a2enmod mpm_prefork

# Dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev zip curl \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install \
    pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Apache module
RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Laravel permission
RUN chmod -R 777 storage bootstrap/cache

# Public dir
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Railway PORT
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf \
 && sed -i 's/:80/:${PORT}/g' /etc/apache2/sites-available/000-default.conf

CMD ["apachectl", "-DFOREGROUND"]
