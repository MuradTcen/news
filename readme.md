[![Build Status](https://travis-ci.com/MuradTcen/news.svg?branch=master)](https://travis-ci.com/MuradTcen/news)
## Тестовое задание 
<p align="center">
Написать laravel-приложение (только back-end), которое работает с новостями.

Приложение должно предоставлять методы:
1. Создания новости
2. Изменения новости*
3. Получения новости (в ответе должно быть: имя создателя новости и кол-во просмотров)
4. Получения списка новостей
5. Удаления новости*

Методы со звёздочкой доступны только пользователю, который создал новость, или администратору. Остальные не защищены и доступны всем. Способ аутентификации любой.

Новость состоит из заголовка и тела, а также количества просмотров (прибавляется при каждом просмотре новости).
Пользователь имеет имя и признак администратора.
Пользователь может создать множество новостей.

База данных - postgreSQL.

Дополнительное задание: разрешить прикрепление файла к новости. Обеспечить возможность скачивания файла.
</p>

## Update (не тестовые дополнения функционала)
<p align="center">

Решена проблема деплоя Laravel + Postgresql на heroku http://vernews.herokuapp.com/ .

Основные шаги:
1. Правильный Procfile: web: heroku-php-apache2 public/
2. Добавить нужный Buildpack
3. Добавить в heroku-окружение APP_KEY, APP_URL приложения
4. Настроить в приложении config/database.php подключение к базе данных (распарсить переменную-строку из окружения и отредактировать настройки подключения)

Решена проблема авторизации через соц. сети в частности github при помощи пакета socialite. 
Переменные github_client_id, github_client_secret, github_callback хранятся в переменных окружениях.
<p>


## TODO

1. Починить дефолтные тесты, проверить в Trevis CI
2. Написать несколько тестов
3. Попробовать реализовать RESTful api
4. Попробовать Mocking