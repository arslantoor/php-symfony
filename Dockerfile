FROM richarvey/nginx-php-fpm:1.10.3

ENV WEBROOT="/var/www/html/public/"

ENV PHP_CATCHALL="1"

ENV RUN_SCRIPTS="1"

COPY --chown=nginx:nginx . /var/www/html/

WORKDIR /var/www/html/