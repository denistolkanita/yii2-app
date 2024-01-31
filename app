#!/bin/bash

if [ "$1" = "run" ]; then
  docker compose up -d
elif [ "$1" = "stop" ]; then
  docker stop yii2-app-php-1
  docker stop yii2-app-db-1
  docker stop yii2-app-phpmyadmin-1
fi