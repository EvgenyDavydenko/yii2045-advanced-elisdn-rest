### Пример создания блога с использованием фреймворка Yii2

1.  Инициализировал проект на базе фреймворка Yii2-advanced:2.0.45
2.  Настроил UrlManager
3.  Добавил поле description в таблицу user: yii migrate/create add_profile_fields
4.  Создал миграцию для добавления стандартных пользователей в таблицу user: yii migrate/create add_users
5.  Сгенерировал CRUD для модели User