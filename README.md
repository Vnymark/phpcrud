# LAMP stack built with Docker Compose

This is a basic LAMP stack environment built using Docker Compose. It consists following:

* PHP 7.2
* Apache 2.4
* MySQL 5.7
* phpMyAdmin

## Installation

Clone this repository on your local computer and run the `docker-compose up`.

```shell
git clone https://github.com/vnymark/phpcrud.git
cd phpcrud/
docker-compose up -d
```

You can access it via `http://localhost`.

## phpMyAdmin

phpMyAdmin is configured to run on port 8080. Use following default credentials.

http://localhost:8080/  
username: root  
password: tiger

## TODO

Add Composer to Docker so the vendor folder don't need to be commited.
Update PDO to avoid SQL-injection.
Better class/model structure.
Merge config folder to outside the hosted folder, to avoid database config won't be browsable.
