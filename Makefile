Сбилдить образы:
    # Билдит все докер образы.
	docker-compose build

    #  Удаляет старый кеш и билдит с нуля (дольше будет билдить)
	docker-compose build --no-cache

Запустить контейнеры:
    # Поднимет все контейнеры записанные в docker-compose файле. Если контейнеры не сбилдены
    # сам их сбилдит. Если вы изменили файлы докера нужно сбилдить заново перед запуском
	docker-compose up -d

Удалить контейнеры:
    # Удаляет контейнеры
	docker-compose down


Создать пользователя-администратора для Voyager:
	php artisan voyager:admin admin@smartdev.com --create

storage-link:
	# Так как локальное окружение на докере, необходимо ввести эту команду таким образом,
	# чтобы symlink был создан в докере
	docker-compose exec php-cli php artisan storage:link



# следующие команды для Windows


composer-install:
    # для установки пакетов через композер
	docker-compose exec php-cli composer install --prefer-source --no-interaction


composer-update:
    # для обновления пакетов если добавите новые пакеты или обновите
	docker-compose exec php-cli composer update --prefer-source --no-interaction


migrate:
    # для того чтобы запустить миграции
	docker-compose exec php-cli php artisan migrate


storage-link:
	docker-compose exec php-cli php artisan storage:link


# Также могут понадобиться на windows
create-admin-docker:
	docker-compose exec php-cli php artisan voyager:admin admin@smartdev.one --create

voyager-install-docker:
	docker-compose exec php-cli php artisan voyager:install --force

cache-clear:
	docker-compose exec php-cli php artisan view:clear
