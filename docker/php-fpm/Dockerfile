FROM php:8.2-fpm-alpine as production

ARG HOST_UID=1000

COPY ./scripts/* /usr/local/bin/

RUN set -xeuo pipefail \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS shadow \
    && apk add --no-cache bash \
      curl \
      wget \
      linux-headers \
      zip \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    && usermod -u "${HOST_UID}" www-data \
    && groupmod -g "${HOST_UID}" www-data  \
    && docker-install-composer \
    && /usr/bin/install -m 0775 -o www-data -g www-data -d /app \
    && apk del .build-deps

WORKDIR /app

FROM production as development

RUN set -xeuo pipefail \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS shadow \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && apk del .build-deps
