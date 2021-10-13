# BOOTCAMP FINAL PROJECT


## BUILD & RUN

$ cp .env.example .env

$ docker-compose up

$ composer require symfony/routing

$ composer require monolog/monolog

## Test

- [http://localhost/index.php](http://localhost)
- [http://localhost/info.php](http://localhost/info.php)
- [http://localhost/permission.php](http://localhost/permission.php)
- [phpmyadmin](http://localhost:8081)
- [adminer](http://localhost:8082)

## MariaDB
server= mariadb

username= root

pass= root

----------------
//admin

username= admin
pass= 123456As
----------------
//moderator

username= admin
pass= 123456As
----------------
//editor

username= editor
pass= 123456As
----------------
//user

username= shib
pass= 123456As

----------------
user_type

1- admin

2- moderator

3- editor

4- user
