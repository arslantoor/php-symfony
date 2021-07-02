FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html

RUN apk add --update nodejs npm

#switch  to user nginx
USER nginx

ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/

RUN npm install --only=dev
#switch  back to user root
USER root

WORKDIR /var/www/html/