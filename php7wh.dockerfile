FROM 247829551128.dkr.ecr.us-east-1.amazonaws.com/php7:84bc4f457ac62b6a2dadcaff9ddf5d384e4d16fa
RUN docker-php-ext-install pdo mysqli pdo_mysql 
ADD test.php /usr/src/test.php
WORKDIR /usr/src
ENTRYPOINT ["/bin/bash"]
