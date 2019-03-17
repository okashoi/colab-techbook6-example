FROM php:7.2-apache

ARG USER_ID
ARG GROUP_ID

RUN apt-get update &&\
    apt-get install -y git mysql-client libicu-dev zlib1g-dev zip&&\
    pecl install xdebug &&\
    docker-php-ext-install mbstring intl pdo_mysql zip &&\
    docker-php-ext-enable xdebug &&\
    curl -sS https://getcomposer.org/installer | php &&\
    mv composer.phar /usr/local/bin/composer &&\
    useradd -m developer -u $USER_ID -g $GROUP_ID

COPY ./myapp.conf /etc/apache2/sites-available/myapp.conf
RUN a2ensite myapp.conf &&\
    a2dissite 000-default.conf

WORKDIR /var/www/app
