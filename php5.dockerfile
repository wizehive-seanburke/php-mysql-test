FROM php:5.4-cli
RUN docker-php-ext-install pdo mysqli pdo_mysql 
ADD test.php /usr/src/test.php
WORKDIR /usr/src