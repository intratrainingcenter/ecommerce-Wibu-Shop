FROM php:7.2-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    &&docker-php-ext-install pdo_mysql mbstring xml mysqli

RUN chmod 777 /var/www/storage/logs/laravel.log
WORKDIR /var/www