FROM richarvey/nginx-php-fpm:1.10.3

ENV WEBROOT="/var/www/html/public/"

ENV PHP_CATCHALL="1"

<<<<<<< HEAD
=======
ENV RUN_SCRIPTS="1"

>>>>>>> fec20a78... Updated feature checklist check/uncheck by admin & view by user
COPY . /var/www/html/

WORKDIR /var/www/html/