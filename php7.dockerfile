FROM php:7.0-cli
RUN docker-php-ext-install pdo mysqli pdo_mysql 
ADD test.php /usr/src/test.php
WORKDIR /usr/src