sudo chmod -R 777 ./

docker compose up -d --build

docker exec blog-api-backend-1 bash -c "composer install & php yii migrate --interactive=0"