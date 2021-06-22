# Checklist App

# Description
This is a simple application that allows user to register and maintain a checklist that is assigned to them at signup. An admin user can list/edit other users, and check/uncheck items in their checklists. 

# Prerequisites
* git
* docker-compose version 3.8
* Docker version 20.10.6

# Tech Stack
* symfony 5.3
* richarvey/nginx-php-fpm:1.10.3

# Package Installation guid
* install composer <a href="https://getcomposer.org/download/">download and install composer</a>
* Install NPM and yarn any latest version to serve your assets/javascript/css files
* Install docker <a href="https://docs.docker.com/engine/install/ubuntu/">install docker</a>
* Install docker-compose <a href="https://docs.docker.com/compose/install/">install docker-compose</a>,</li>

# Project Setup steps
Clone the project from Github repo
```git clone
git clone https://github.com/arslantoor/php-symfony.git
```
Build the docker image with docker-compose
```
cd php-symfony
docker-compose build
```
Run docker container with docker-compose
```
docker-compose up
```
Run bin/console command to change user role
```
php bin/console update-user 1 ROLE_USER
```

Brows <a href="http://localhost:8080">localhost:8080<a>
