build:
	docker compose build --no-cache
stop:
	docker compose down
start:
	docker compose up -d
restart:
	docker compose down && docker compose up -d
migrate-fresh-seed:
	docker exec api-template-service php artisan migrate:fresh --seed
