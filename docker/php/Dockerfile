ARG PHP_VERSION=8.1

FROM php:${PHP_VERSION}-fpm-alpine3.15

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    bash \
    git \
    zip \
    unzip \
    && docker-php-ext-install opcache pdo_mysql mysqli \
    && docker-php-ext-enable opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && curl -sS https://get.symfony.com/cli/installer | bash \
    && mv /root/.symfony/bin/symfony /usr/local/bin/symfony