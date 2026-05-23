# ── Stage 1: Build ─────────────────────────────────────────────
FROM php:8.3-fpm-alpine AS builder

RUN apk add --no-cache \
    git curl unzip \
    postgresql-dev \
    postgresql-libs \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

COPY . .
RUN composer run-script post-autoload-dump --no-interaction 2>/dev/null || true

# ── Stage 2: Production ────────────────────────────────────────
FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    nginx \
    supervisor \
    postgresql-dev \
    postgresql-libs \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql opcache

WORKDIR /app
COPY --from=builder /app .

# Copy configs
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy and make start script executable
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Fix storage permissions
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8080
CMD ["/start.sh"]