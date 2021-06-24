FROM richarvey/nginx-php-fpm:1.10.3
USER root

RUN chown nginx:nginx /var/www/html
RUN apk add --update nodejs npm

<<<<<<< HEAD
USER 100
=======
<<<<<<< HEAD
>>>>>>> 8129874e2571af75d99647a3edbc6d707b65190f

ENV WEBROOT="/var/www/html/public/"
ENV PHP_CATCHALL="1"
ENV RUN_SCRIPT="1"

RUN apk add --update npm
=======
USER 100
>>>>>>> 7608035f842b471de88d6d49c0aac884f87d8c58

ENV  WEBROOT="/var/www/html/public/"
COPY --chown=nginx:nginx . /var/www/html/

# give ownership to nginx user
RUN npm install --only=dev
<<<<<<< HEAD
=======

USER root
>>>>>>> 8129874e2571af75d99647a3edbc6d707b65190f

USER root

WORKDIR /var/www/html/
