DOCKER_COMPOSE_EXEC = docker exec -t api-template-service

build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d
restart:
	docker compose down && docker compose up -d
migrate-fresh-seed:
	$(DOCKER_COMPOSE_EXEC) php artisan migrate:fresh --seed
test:
	$(DOCKER_COMPOSE_EXEC) php ./vendor/bin/phpunit
dump-autoload:
	$(DOCKER_COMPOSE_EXEC) composer dump-autoload
