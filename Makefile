up:docker-up
init:docker-down docker-pull docker-build docker-up

docker-up:
	docker-compose up 

docker-down:
	docker-compose down --remove-orphans

docker-pull:
	docker-compose pull

docker-build:
	docker-compose build


