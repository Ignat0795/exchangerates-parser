FROM php:8.2.8-fpm-alpine

# Install packages
RUN apk add --no-cache curl git build-base zlib-dev oniguruma-dev autoconf bash
RUN apk add --update linux-headers

# Xdebug
ARG INSTALL_XDEBUG=false
RUN if [ ${INSTALL_XDEBUG} = true ]; then \
    pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug \
;fi

COPY ./docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Postgres
RUN apk add --no-cache libpq-dev && docker-php-ext-install pdo_pgsql

# Nginx
RUN apk add --update --no-cache nginx
COPY ./docker/php-fpm/nginx.conf /etc/nginx/
RUN chown -Rf www-data:www-data /var/lib/nginx

# Supervisor
RUN apk add --no-cache supervisor
COPY ./docker/php-fpm/supervisord.conf /etc/supervisord.conf

# Configure non-root user.
ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Source code
RUN chown www-data:www-data /var/www
COPY --chown=www-data:www-data ./ /var/www
WORKDIR /var/www

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD php-fpm

EXPOSE 9000
