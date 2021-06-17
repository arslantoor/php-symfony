# Description
Setup of basic symfony checklist app which assign checklist on user signup, user can be differentiate on the base of user Role such as ROLE_ADMIN and ROLE_USER.This app is using sonata admin bundle to manage user record.


# Prerequisites
* symfony 5.3
* Symfony CLI version v4.23.5
* composer version 2.0.13
* docker-compose version 3.8
* Docker version 20.10.6
* Sonata Admin bundle 4.4

# Package Installation guid
* install composer <a href="https://getcomposer.org/download/">download and install composer</a>
* Install NPM and yarn any latest version to serve your assets/javascript/css files
* Install docker <a href="https://docs.docker.com/engine/install/ubuntu/">install docker</a>
* Install docker-compose <a href="https://docs.docker.com/compose/install/">install docker-compose</a>,</li>

# Project Setup steps

```git clone
git clone https://github.com/arslantoor/php-symfony.git
```
```
cd php-symfony
```


```
composer install or run composer.phar install
```

```
npm install
```
```
docker-compose build
```

```
docker-compose up
```

# Console Command
```
php bin/console update-user 1 ROLE_USER
```

Brows <a href="http://localhost:8080">localhost:8080<a>
