FROM php:8.4-cli

# Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de trabajo
WORKDIR /app

# Copiar archivos de Composer y ejecutar instalación (cache)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copiar el resto del código
COPY . .

# Crear las carpetas necesarias y asignar permisos
RUN mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Optimizar Laravel (esto genera la clave y cachea config, rutas, etc.)
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Exponer puerto y arrancar servidor
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000