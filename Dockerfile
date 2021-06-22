FROM richarvey/nginx-php-fpm:1.10.3

ENV WEBROOT="/var/www/html/public/"

RUN apk add --update npm

COPY --chown=nginx:nginx . /var/www/html/

RUN npm install

WORKDIR /var/www/html/