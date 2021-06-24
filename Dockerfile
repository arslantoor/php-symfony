FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html
RUN apk add --update nodejs npm

USER 100
RUN apk add --update npm

ENV WEBROOT="/var/www/html/public/"
ENV PHP_CATCHALL="1"
ENV RUN_SCRIPT="1"


ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/

# give ownership to nginx user
RUN npm install --only=dev

USER root

WORKDIR /var/www/html/
