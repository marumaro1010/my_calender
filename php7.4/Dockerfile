FROM php:7.4-apache

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable mysqli

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