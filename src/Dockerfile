FROM php:8.1.2-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    nano

RUN docker-php-ext-install pdo pdo_mysql

COPY ./src/app/composer.* ./

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction

RUN composer dump-autoload --optimize

RUN chmod -R 0777 /var/www/

RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html
CMD ["/usr/sbin/apachectl", "-D", "FOREGROUND"]
