docker-compose up -d
docker exec apache-php composer install
docker exec apache-php php artisan migrate --seed

docker exec apache-php ./vendor/bin/phpcs --report=checkstyle --report-file=result/test_phpcs.xml ./app/Http/Controllers/Controller.php

var1=$?
array=($var1)

docker exec apache-php ./vendor/bin/phpunit --log-junit result/phpunit.xml

var2=$?
array+=($var2)

docker-compose down

for i in ${array[@]}
do
  if [ $i != 0 ]; then
    echo 'fail'
    exit 1
  fi
done

echo 'success'
exit 0
