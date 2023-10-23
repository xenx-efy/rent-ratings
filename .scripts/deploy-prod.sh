#!/bin/bash
set -e

# Запуск режима обслуживания приложения
(php artisan down) || true

# Нужно для включения ssh агента чтобы можно было добавить
# в него приватный ключ для подключения к github
eval `ssh-agent -s`

# Добавления приватного ключа для подключения к github
ssh-add ~/.ssh/github-actions

# Обновление данных git
git fetch

# Сброс всех изменений в гите, чтобы ничего не конфликтовало
git stash

git checkout production

# Выгрузка последней версии приложения из ветки develop
git pull origin production

# Установка зависимостей composer
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev
# --no-interaction means prevent any user interactions. Когда например спрашивает согласие на установку.
# --prefer-dist means "download and install packages as pre-built archives (dist) instead of downloading the source code and building the package from scratch"
# --optimize-autoloader генерирует более оптимальный autoload.php файл
# --no-dev не устанавливает require-dev зависимости

# Очистка старого кеша
php artisan clear-compiled

# Кеширование конфигурации
php artisan config:cache

# Кеширование роутинга
php artisan route:cache

# Кеширование шаблонов blade
php artisan view:cache

# Создание нового кеша
php artisan optimize

# Run database migrations
php artisan migrate --force

npm install

npm run build

# Выключение режима обслуживания
php artisan up
