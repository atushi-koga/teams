docker-compose up -d
docker exec apache-php composer install
docker exec apache-php php artisan migrate --seed

bash job_script.sh ; RETURN=$?

docker-compose down
exit $RETURN
