#FROM php:7.2.2-fpm
#FROM php:5.6.35-apache

FROM php:7.2-apache

RUN apt-get update && \
    apt-get install -y git unzip zlib1g-dev libssl-dev --no-install-recommends \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && a2enmod rewrite

WORKDIR /var/www/html

COPY ./ /var/www/html/

RUN composer install --prefer-source --no-interaction

