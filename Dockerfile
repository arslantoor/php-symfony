FROM richarvey/nginx-php-fpm:1.10.3

ENV WEBROOT="/var/www/html/public/"

ENV PHP_CATCHALL="1"

COPY app/* /var/www/html/

WORKDIR /var/www/html/