# Makefile
.PHONY: init build stop start restart migrate-fresh-seed test test-with-coverage test-with-coverage-html dump-autoload list-routes service-shell setup-service-frontend phpcs phpcs-fix

ifneq (,$(wildcard ./.env))
    include .env
    export
endif

DOCKER_EXEC = docker exec -t $(CONTAINER_NAME_SERVICE)

init:
	cp .env.example .env && \
	make build && \
	make start && \
	make composer-install && \
	make migrate-fresh-seed && \
	make setup-service-frontend
build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d
restart:
	make stop && \
	make start
migrate-fresh-seed:
	$(DOCKER_EXEC) php artisan migrate:fresh --seed
test:
	$(DOCKER_EXEC) php ./vendor/bin/phpunit
test-with-coverage:
	$(DOCKER_EXEC) docker-php-ext-enable pcov && \
	$(DOCKER_EXEC) ./vendor/bin/phpunit --coverage-text
test-with-coverage-html:
	$(DOCKER_EXEC) docker-php-ext-enable pcov && \
	$(DOCKER_EXEC) ./vendor/bin/phpunit --coverage-html=coverage && \
	open coverage/index.html
dump-autoload:
	$(DOCKER_EXEC) composer dump-autoload
composer-install:
	$(DOCKER_EXEC) composer install --no-plugins --no-scripts
list-routes:
	$(DOCKER_EXEC) php artisan route:list
service-shell:
	docker exec -it $(CONTAINER_NAME_SERVICE) /bin/bash
setup-service-frontend:
	$(DOCKER_EXEC) php artisan view:clear && \
	npm install && \
	npm run build
open-service:
	open http://localhost:$(APP_PORT)
open-frontend:
	open http://localhost:$(VITE_PORT)
phpcs:
	$(DOCKER_EXEC) ./vendor/bin/phpcs -p
phpcs-fix:
	$(DOCKER_EXEC) ./vendor/bin/php-cs-fixer fix
