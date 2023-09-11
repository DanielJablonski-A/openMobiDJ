FROM php:8.2-apache
 
RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    apt-transport-https \
    ca-certificates \
    libzip-dev \
    unzip \
    wget \
    curl \
    git \
    libicu-dev \
    gnupg

RUN docker-php-ext-install \
    zip \
    intl

# Instalacja Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY . /var/www

WORKDIR /var/www

CMD ["apache2-foreground"]
