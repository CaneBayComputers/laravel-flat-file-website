#!/bin/bash

set -e

shopt -s expand_aliases

ORIG_DIR=$(pwd)

cd $(dirname "$(realpath "$0")")

echo; echo

if [[ "$(whoami)" == "root" ]]; then echo-red "Do NOT run with sudo!"; exit 1; fi

DEV_MODE=false

while [[ "$#" -gt 0 ]]; do

    case "$1" in

        --dev)
            DEV_MODE=true
            source ../../extras/.bash_aliases
			unalias cp
            ;;

        *)
            echo "Unknown option: $1"
            exit 1
            ;;

    esac

    shift

done

PROJECT_NAME=$(basename $(pwd))

echo; echo-cyan "Installing $PROJECT_NAME ..."; echo-white

PROJECT_NAME_SNAKE=$(echo "$PROJECT_NAME" | tr '[:upper:]' '[:lower:]' | tr '-' '_')

if [[ "$DEV_MODE" == true ]]; then

	# Get a random D class number and make sure it doesn' already exist in hosts file	
	while true; do

		D_CLASS=$((RANDOM % (250 - 100 + 1) + 100))

		IP_ADDRESS=10.2.0.$D_CLASS

		if ! cat /etc/hosts | grep "$IP_ADDRESS"; then break; fi

	done

	# Write the new project host and Docker IP address
	while true; do

		HOST_LINE=$(cat /etc/hosts | grep -n -m 1 $PROJECT_NAME | cut -d : -f 1)

		if ! [[ -z $HOST_LINE ]]; then

			sudo sed -i "${HOST_LINE}d" /etc/hosts

		else

			break

		fi

	done

	echo "$IP_ADDRESS      $PROJECT_NAME" | sudo tee -a /etc/hosts

 	cp -f docker-compose.example.yaml docker-compose.yaml

 	sed -i "s/10\.2\.0\.30/$IP_ADDRESS/g" docker-compose.yaml

 	sed -i "s/cbc-laravel-php7/$PROJECT_NAME/g" docker-compose.yaml

 	# cd ../../scripts

 	# source startup.sh --no-status $PROJECT_NAME

 	# cd ../projects/$PROJECT_NAME

 	echo; echo

 	if [ ! -f "vendor/composer/installed.json" ]; then

		composer --ignore-platform-reqs install

		echo; echo

	fi

	if ! [ -f .env ]; then

		cp -f .env.docker .env

		sed -i "s/cbc-laravel-php7/$PROJECT_NAME/g" .env

		sed -i "s/cbc_laravel_php7/$PROJECT_NAME_SNAKE/g" .env

		art-docker key:generate

		echo; echo

	fi

	if ! mysql -h"cbc-mariadb" -u"root" -e "USE $PROJECT_NAME_SNAKE;" 2>/dev/null; then

        mysql -h"cbc-mariadb" -u"root" -e "CREATE DATABASE IF NOT EXISTS $PROJECT_NAME_SNAKE;"

        echo; echo

    fi

    art-docker migrate

    cd ../../scripts

 	source status.sh $PROJECT_NAME

 	cd ../projects/$PROJECT_NAME

else

	composer install

	if ! [ -f .env ]; then

		cp -f .env.production .env

		php artisan key:generate

	fi

	php artisan migrate

fi

echo; echo

find storage/framework -maxdepth 1 -type d -exec chmod 777 {} +

chmod 777 storage/logs

setfacl -m "default:group::rw" storage/logs

chmod 777 storage/temp

chmod 777 bootstrap/cache

touch is_installed