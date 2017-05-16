#!/usr/bin/env bash

composer install

cd ./vendor/litalex/laradocklex/

#--- Docker ---#
docker-compose build nginx mysql
docker-compose up -d nginx mysql

docker-compose exec workspace bash

php artisan migrate:refresh --seed

echo "* * * * * php artisan schedule:run >>/dev/null 2>&1" >> /var/spool/cron/alex

#--- Gulp ---#
sudo apt-get update
sudo apt-get install nodejs-legacy
sudo npm install gulp -g;
npm install --save-dev;
sudo npm install bower -g
bower install --allow-root;
gulp build;
