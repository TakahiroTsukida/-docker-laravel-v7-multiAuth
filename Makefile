.PHONY: init
init:
	cp .env.example .env
	docker-compose up -d --build
	docker-compose exec app composer-install
	docker-compose exec app composer require laravel/ui 2.*
	docker-compose exec app php artisan key:generate
	docker-compose exec app npm-install
	docker-compose exec app php artisan migrate --seed
