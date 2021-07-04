FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html

ENV PHP_CATCHALL="1"
ENV RUN_SCRIPT="1"
RUN apk add --update npm

#switch  to user nginx
USER nginx

ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/
RUN npm install --only=dev

#switch  back to user root
USER root
WORKDIR /var/www/html/
