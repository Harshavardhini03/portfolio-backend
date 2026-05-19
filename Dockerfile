FROM php:8.3-fpm-alpine AS builder

RUN apk add --no-cache git curl unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .
RUN composer run-script post-autoload-dump --no-interaction 2>/dev/null || true

# ── Production image ───────────────────────────────────────────
FROM php:8.3-fpm-alpine

RUN apk add --no-cache nginx supervisor libpq \
    && docker-php-ext-install pdo pdo_pgsql opcache

WORKDIR /app
COPY --from=builder /app .

RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 8080
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
