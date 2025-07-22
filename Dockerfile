# syntax = docker/dockerfile:experimental
ARG PHP_VERSION=8.2
FROM fideloper/fly-laravel:${PHP_VERSION} as base
LABEL fly_launch_runtime="laravel"

COPY . /var/www/html

RUN composer install --optimize-autoloader --no-dev \
    && mkdir -p storage/logs \
    && php artisan optimize:clear \
    && chown -R www-data:www-data /var/www/html

EXPOSE 8080
