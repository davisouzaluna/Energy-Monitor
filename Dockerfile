# Use uma imagem base do PHP 8.2
FROM php:8.2-cli

# Instale as extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql

WORKDIR /var/www/html

COPY aplicacao /var/www/html

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && apt-get install -y nodejs  
RUN npm install && npm run build

# Comando padrão ao iniciar o contêiner
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
