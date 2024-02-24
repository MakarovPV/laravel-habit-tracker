# Трекер привычек

Таблица-календарь для отслеживания прогресса внедрения привычек в свою жизнь.

## Запуск приложения

Запустите следующую команду из корневой директории проекта.

```
docker-compose up -d; docker exec project_app bash -c "composer install && cp .env.example .env && php artisan load:all"
```
