FROM php:8.2-fpm

WORKDIR /var/www

# Instala as dependências necessárias para as extensões do PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath ctype

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuração de usuário
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiar a aplicação
COPY . /var/www
COPY --chown=www:www . /var/www
COPY ./.docker/php/local.ini /usr/local/etc/php/php.ini

# Muda para o usuário www
USER www

EXPOSE 9000

