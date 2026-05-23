#!/bin/sh
set -e

echo "=== Running Laravel setup ==="

# Run migrations and seed database
php artisan migrate --force --seed

# Clear and cache config for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions
chmod -R 775 storage bootstrap/cache

echo "=== Starting server ==="

# Start supervisor (nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf