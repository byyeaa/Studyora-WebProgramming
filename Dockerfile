FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev \
    libonig-dev libxml2-dev zip curl \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions
RUN docker-php-ext-install \
    pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# ====== INSTALL NODE.JS (UNTUK VITE) ======
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
 && apt-get install -y nodejs

WORKDIR /app
COPY . .

# ====== BUILD VITE ======
RUN npm install
RUN npm run build

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Laravel permission
RUN chmod -R 777 storage bootstrap/cache

# Clear cache biar ENV Railway kebaca
RUN php artisan config:clear

EXPOSE ${PORT}

CMD php artisan serve --host=0.0.0.0 --port=${PORT}
