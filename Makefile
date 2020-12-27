.PHONY: init
init:
	cp .env.example .env
	docker-compose up -d --build
	docker-compose exec docker-laravel-v7-multiauth_app_1 composer-install
	docker-compose exec docker-laravel-v7-multiauth_app_1 composer require laravel/ui 2.*
	docker-compose exec docker-laravel-v7-multiauth_app_1 php artisan key:generate
	docker-compose exec docker-laravel-v7-multiauth_app_1 npm-install
	docker-compose exec docker-laravel-v7-multiauth_app_1 php artisan migrate --seed
