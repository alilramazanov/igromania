build-project:
	docker-compose build
	docker-compose up -d
	docker-compose exec php-cli composer install --prefer-source --no-interaction
	docker-compose exec php-cli php artisan migrate:refresh
	docker-compose exec php-cli php artisan db:seed
	docker-compose exec php-cli php artisan storage:link
	docker-compose exec php-cli chmod -R 777 ./storage
	docker-compose exec php-cli cp -R ./vendor/swagger-api/swagger-ui/dist ./public/docs/asset










