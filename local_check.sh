#!/bin/sh

./vendor/bin/phpcs --report=checkstyle --report-file=result/test_phpcs.xml ./app/Http/Controllers/Controller.php
var1=$?
array=($var1)

./vendor/bin/phpunit --log-junit result/phpunit.xml --filter GetSpectatorsInfoTest
var2=$?
array+=($var2)

for i in ${array[@]}
do
  if [ $i != 0 ]; then
    echo 'fail'
    exit 1
  fi
done

echo 'success'
exit 0
