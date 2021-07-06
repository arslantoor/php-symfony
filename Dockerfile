FROM richarvey/nginx-php-fpm:1.10.3
USER root

ENV WEBROOT="/var/www/html/public/"
RUN chown nginx:nginx /var/www/html
RUN apk add --update npm

#switch  to user nginx
USER nginx

COPY --chown=nginx:nginx . /var/www/html/
RUN npm install --only=dev

#switch  back to user root
USER root

WORKDIR /var/www/html/