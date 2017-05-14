FROM php:latest

COPY ./composer.sh /usr/local/bin/composer

RUN chmod +x /usr/local/bin/composer

RUN ls -l /usr/local/bin

RUN /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /usr/local/apache2/htdocs

RUN apt-get install libapache2-mod-php7.1

RUN composer install