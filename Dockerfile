FROM phpstorm/php-apache:latest
WORKDIR /usr/local/etc/php
RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-enable pdo_mysql
