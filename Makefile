SERVICE_NAME = app-template-service
DOCKER_EXEC = docker exec -t app-template-service

init:
	cp .env.example .env && make build && make start && make migrate-fresh-seed
build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d
restart:
	make stop && make start
migrate-fresh-seed:
	$(DOCKER_EXEC) php artisan migrate:fresh --seed
test:
	$(DOCKER_EXEC) php ./vendor/bin/phpunit
dump-autoload:
	$(DOCKER_EXEC) composer dump-autoload
list-routes:
	$(DOCKER_EXEC) php artisan route:list
ssh:
	docker exec -it $(SERVICE_NAME) /bin/sh
