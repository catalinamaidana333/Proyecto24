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

# Copiar archivos de Composer y ejecutar instalación
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copiar el resto del código de la app
COPY . .

# Crear las carpetas necesarias y asegurar permisos básicos
RUN mkdir -p storage/framework/cache \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# EXPLICACIÓN: Eliminamos las líneas de "php artisan config:cache" 
# para que Laravel lea correctamente las variables de Railway en vivo.


# Exponer puerto y arrancar servidor de forma limpia
EXPOSE 8000
# Borramos public/storage si existe, recreamos el enlace limpio y encendemos el servidor
CMD php artisan migrate --force && rm -rf public/storage && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=8000