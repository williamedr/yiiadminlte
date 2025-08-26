#!/bin/bash -xe

cd /app

# set all variables from .env file
if [ -e .env ] ; then
  set -a
  source .env
  set +a
else
 touch .env
fi

export APACHE_RUN_USER=www-data
export APACHE_RUN_GROUP=www-data
export APACHE_LOG_DIR=/var/log/apache2
export APACHE_LOCK_DIR=/var/lock/apache2
export APACHE_PID_FILE=/var/run/apache2.pid
export APACHE_RUN_DIR=/var/run/apache2
export APACHE_CONFDIR=/etc/apache2
export APACHE_ENVVARS=/etc/apache2/envvars

source .env


cp frontend/000-default.conf /etc/apache2/sites-available/

composer install

php init --env=Development --overwrite=y

cp common/config/main-local-docker.php common/config/main-local.php

/usr/sbin/apache2 -DFOREGROUND
