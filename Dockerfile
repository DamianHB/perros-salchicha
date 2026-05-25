FROM php:8.3-fpm-alpine

RUN apk add --no-cache nginx libpq-dev \
    && docker-php-ext-install pgsql pdo_pgsql

COPY . /var/www/html/

COPY nginx.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD sh -c "php-fpm -D && nginx -g 'daemon off;'"
