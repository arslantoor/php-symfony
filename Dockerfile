FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html
RUN apk add --update nodejs npm

USER 100

ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/

# give ownership to nginx user
RUN npm install --only=dev

USER root

WORKDIR /var/www/html/