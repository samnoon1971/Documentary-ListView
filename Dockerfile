FROM php:8.1-fpm

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip git libpq-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY . .

COPY .env /var/www/html/.env
EXPOSE 80
EXPOSE 5432
RUN composer install

RUN php artisan key:generate




CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
