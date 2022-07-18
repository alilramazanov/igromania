

build docker images:
	docker-compose build

run docker container:
	docker-compose up -d

install composer:
	docker-compose exec php-cli composer install --prefer-source --no-interaction

create migration:
	docker-compose exec php-cli php artisan migrate

run database seeders:
	docker-compose exec php-cli php artisan db:seed

create storage link:
	docker-compose exec php-cli php artisan storage:link






