FROM richarvey/nginx-php-fpm:1.10.3

ENV WEBROOT="/var/www/html/public/"

COPY app/* /var/www/html/

WORKDIR /var/www/html/