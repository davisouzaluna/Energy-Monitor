# Use uma imagem base do PHP 8.2
FROM php:8.2-fpm

# Instale as extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copie o arquivo composer.lock e o composer.json para o contêiner
COPY composer.lock composer.json /var/www/html/

# Instala as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copie todo o projeto para o contêiner
COPY . /var/www/html

# Instale as dependências do Laravel
RUN composer install
