
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

# Console Command
The command written bellow has integer value <user_id> which refer to User Entity ,database table id and <user_roles> is denoting to user role you can find the user id by running this command "php bin/console update-user" this will list the User entity 'database' table where you can see the user id and roles and then You can use the bellow command to change your user roles
```
php bin/console update-user <user_id> <user_roles>
```
Brows <a href="http://localhost:8080">localhost:8080<a>

