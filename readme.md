## Pong Lan Software

[![Build Status](https://travis-ci.org/KarlJakober/PLS-Laravel.svg)](https://travis-ci.org/KarlJakober/PLS-Laravel)

## Installation

Clone repo
```
cd PLS-Laravel/
sudo composer install
```
create pls_config.php file inside app/config directory
contents below, modify to fit your database information
```
<?php
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'pls');

```
Ensure correct database is made
```
php artisan migrate
```
```
php artisan db:seed
```

Make sure to reset migrations and reseed your database every update (during development)

```
php artisan migrate:reset
php artisan db:seed
```
If you encounter an error, you may need to manually drop all tables in the database and run
```
php artisan migrate
```

if you are using php 5.4 you can start phps built in server for testing purposes
```
php artisan serve
```
