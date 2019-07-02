чтобы запустить приложение необходим установленный docker и docker-compose
1 собираем и запускаем контейнеры docker-compose up -d
2 необходимо подтянуть зависимости и выполнить миграцию
   для этого проваливаемся в контейнер php-cli !не из под рута
   для примера docker exec -it -u 1000 news_php-cli_1_b3a43b91e1e9 bash
    внутри контейнера выполняем
    установку командой composer install
    миграции  php yii migrate --interactive=0 
    и дадим права на запись
      папке web/assets коммандой chown www-data:www-data web/assets
      папке runtime командой chmod 777 runtime
