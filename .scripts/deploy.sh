#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Install composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# Pull the latest version of the app
git pull origin develop

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

echo "Deployment finished!"
