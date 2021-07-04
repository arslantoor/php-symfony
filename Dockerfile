FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html

RUN apk add --update npm
ENV PHP_CATCHALL="1"
RUN apk add --update npm

#switch  to user nginx
USER nginx

ENV  WEBROOT="/var/www/html/public/"
ENV RUN_SCRIPTS='1'
COPY --chown=nginx:nginx . /var/www/html/
RUN npm install --only=dev

#switch  back to user root
USER root

WORKDIR /var/www/html/
