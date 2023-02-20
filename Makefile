init: docker-down-clear docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker-compose up -d

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build

api-init: api-composer-install api-wait-db api-migrations

api-composer-install:
	docker-compose run --rm php-cli composer install

api-wait-db:
	docker-compose run --rm php-cli wait-for-it postgres:5432 -t 30

api-migrations:
	docker-compose run --rm php-cli composer app migrations:migrate
