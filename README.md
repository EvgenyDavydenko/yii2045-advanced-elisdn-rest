### Пример создания блога с использованием фреймворка Yii2

1.  Инициализировал проект на базе фреймворка Yii2-advanced:2.0.45
2.  Настроил UrlManager
3.  Добавил поле description в таблицу user: yii migrate/create add_profile_fields
4.  Создал миграцию для добавления стандартных пользователей в таблицу user: yii migrate/create add_users
5.  Сгенерировал CRUD для модели User
6.  Разнес по разны контроллерам список пользователей и профиль пользователя
7.  Модель профиля ищу не по id переданному в url, а по id залогиненого пользователя
8.  Добавил RBAC для контроля отображения кнопки ведущей на профиль пользователя
9.  Создал миграцию для таблицы post: yii migrate/create create_post_table
10. Сгенерировал модель для таблицы post
11. Засев данными таблицы post при помощи Faker
12. Сгенерировал CRUD для модели Post
13. В PostsController оставил только метод вывода всех постов
14. Создал виджет всех постов одного пользователя