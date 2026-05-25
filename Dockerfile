FROM php:8.3-cli

RUN docker-php-ext-install pgsql pdo_pgsql

WORKDIR /app
COPY . .

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080"]
