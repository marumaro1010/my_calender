FROM php:7.4-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli xdebug

RUN apt-get update
RUN apt-get -y install git \
                       wget \
                       gcc \
                       curl \
                       vim 
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

# clear cache
RUN apt-get clean && \
    rm -rf /var/cache/apt




WORKDIR /var/www/html
EXPOSE 9000