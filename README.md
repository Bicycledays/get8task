# Цель проекта
Привет! Перед тобой репозиторий веб-приложения, написанного с помощью Phalcon framework в рамках тестового задания к собеседованию в компанию Get8

[Требования к проекту и формулировка задания](https://docs.google.com/document/d/1HpV6uko_MZkhS26PFzZZPLgdja87zm6uuw1TbOUDllw/edit?usp=sharing)

# Установка
## В разработке данного приложения был использован следующий стек
```
PHP 7.4
Phalcon 4.1.0 
MySQL
```
## Последовательность установки

### Загрузка проекта через cmd
```
git clone https://github.com/get8task.git
```
### Установка необходимых пакетов
Из корневой директории проекта выполни
```
composer install
```
### Настройка конфигурации БД
Необходимо создать БД с именем `webhooks` или указать имя существующей БД в [config.php](app/config/config.php)
### Создание таблиц в БД
Из корневой директории проекта выполни
```
phalcon migration run
```
Данная команда создает в БД необходимые таблицы в базе данных, связанные между собой

# Описание
Приложение спроектированно согласно MVC паттерну.
Реализовано три контроллера:

| Контроллер  | Назначение                                                                                                                                            |
| :---------: |:------------------------------------------------------------------------------------------------------------------------------------------------------|
| `IndexController`     | Отвечает за главную страницу                                                                                                                |
| `UsersController`     | Формирует страницу со списком пользователей, посредством одноименной модели. Реализована пагинация                                          |
| `WebhookController`   | Принимает webhook запрос по соответствующему адресу, сохраняет данные из запроса посредством моделей Users и Data, а также формирует и отправляет ответ|
