
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