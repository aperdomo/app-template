DOCKER_COMPOSE_EXEC = docker exec -t app-template-service

init:
	cp .env.example .env && make build && make start
build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d
restart:
	make stop && make start
migrate-fresh-seed:
	$(DOCKER_COMPOSE_EXEC) php artisan migrate:fresh --seed
test:
	$(DOCKER_COMPOSE_EXEC) php ./vendor/bin/phpunit
dump-autoload:
	$(DOCKER_COMPOSE_EXEC) composer dump-autoload
list-routes:
	$(DOCKER_COMPOSE_EXEC) php artisan route:list
