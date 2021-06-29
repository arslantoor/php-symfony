FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html
RUN apk add --update npm
ENV PHP_CATCHALL="1"
RUN apk add --update npm

USER 100

ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/
RUN npm install --only=dev

USER root
WORKDIR /var/www/html/
