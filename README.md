# php-symfony with docker
<b>Version Details: <b>
<ul>
<li>symfony 5.3</li>
<li>Symfony CLI version v4.23.5 </li>
<li>composer version 2.0.13 </li>
<li>docker-compose version 3.8 </li>
<li>Docker version 20.10.6 </li>
</ul>
<p>Please Follow bellow instructions to install project into your local machine</p>
<h2>project package and bundle installation</h2>
<ul>
<li>install composer <a href="https://getcomposer.org/download/">download and install composer</a></li>
<li>Install NPM and yarn any latest version to serve your assets/javascript/bootstrape and other web packs</li>
<li>Install docker<a href="https://docs.docker.com/engine/install/ubuntu/">install docker from here</a>,</li>
<li>Install docker-compose <a href="https://docs.docker.com/compose/install/">install docker-compose from here</a>,</li>

</ul>
<p>Add .env file and add your MAILER_DSN and DATABSE_URL</p>



```apacheconf
composer install or run composer.phar install
```

```apacheconf
npm install
```

```apacheconf
docker-compose build
```

```apacheconf
docker-compose up
```
Brows <a href="http://localhost:8080">localhost:8080<a>