FROM richarvey/nginx-php-fpm:1.10.3
USER root

ENV WEBROOT="/var/www/html/public/"
ENV PHP_CATCHALL="1"

RUN apk add --update npm
RUN npm install -g yarn
RUN chown nginx:nginx /var/www/html

#switch  to user nginx
USER nginx

COPY --chown=nginx:nginx . /var/www/html/
RUN npm install --only=dev
RUN yarn build

#switch  back to user root
USER root

WORKDIR /var/www/html/