# Makefile
include env.mk

DOCKER_EXEC = docker exec -t $(CONTAINER_NAME_SERVICE)

init:
	cp .env.example .env && make build && make start && make migrate-fresh-seed && make setup-frontend
build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d && open http://localhost:$(APP_PORT) && open http://localhost:$(VITE_PORT)
restart:
	make stop && make start
migrate-fresh-seed:
	$(DOCKER_EXEC) php artisan migrate:fresh --seed
test:
	$(DOCKER_EXEC) php ./vendor/bin/phpunit
test-with-coverage:
	$(DOCKER_EXEC) docker-php-ext-enable pcov && $(DOCKER_EXEC) ./vendor/bin/phpunit --coverage-text
test-with-coverage-html:
	$(DOCKER_EXEC) docker-php-ext-enable pcov && $(DOCKER_EXEC) ./vendor/bin/phpunit --coverage-html=coverage && open coverage/index.html
dump-autoload:
	$(DOCKER_EXEC) composer dump-autoload
list-routes:
	$(DOCKER_EXEC) php artisan route:list
ssh:
	docker exec -it $(CONTAINER_NAME_SERVICE) /bin/sh
setup-frontend:
	$(DOCKER_EXEC) npm install && php artisan view:clear && npm run build
build-assets:
	$(DOCKER_EXEC) php artisan view:clear && npm run build
