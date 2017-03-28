#!/usr/bin/env bash

composer install

cd ./vendor/litalex/laradocklex/

docker-compose build nginx mysql
docker-compose up -d nginx mysql

docker-compose exec workspace bash

php artisan migrate:refresh --seed
