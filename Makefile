PHP = docker-compose run --rm php-cli

.PHONY: setup up down artisan composer

.env:
	cp .env.example .env

src/.env:
	cp src/.env.example src/.env

setup: .env src/.env up
	$(MAKE) composer CMD="install"
	$(MAKE) artisan CMD="key:generate"
	$(MAKE) artisan CMD="migrate"

up: .env
	docker-compose up -d --build

down:
	docker-compose down

artisan: src/.env
	$(PHP) php artisan $(CMD)

composer:
	$(PHP) composer $(CMD)
