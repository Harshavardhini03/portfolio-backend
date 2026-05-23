#!/bin/sh
set -e

echo "=== Running Laravel setup ==="

# Fix permissions first
chmod -R 775 storage bootstrap/cache 2>/dev/null || true

# Clear any cached config to ensure fresh env vars are used
php artisan config:clear
php artisan cache:clear

# Run migrations (--force skips the production prompt)
echo "Running migrations..."
php artisan migrate --force

# Seed only if tables are empty (safe to run on every deploy)
echo "Seeding database..."
php artisan db:seed --force

# Cache config AFTER migrations succeed
php artisan config:cache
php artisan route:cache

echo "=== Starting server ==="

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf