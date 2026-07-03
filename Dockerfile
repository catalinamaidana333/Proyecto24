FROM php:8.4-cli

# Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar el código y ejecutar Composer
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto y arrancar servidor
CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000