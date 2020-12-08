FROM php:7.3-fpm

COPY composer.lock composer.json /var/www/

WORKDIR /var/www

# Instalando...
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Limpando o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalando extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Instalando o composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Adicionando usuário laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiando pasta da aplicação folder
COPY . /var/www

# Copiando permissões existentes para a pasta do docker
COPY --chown=www:www . /var/www
RUN chown -R www-data:www-data /var/www

# Mudando usuário atual para www
USER www

# Expondo a porta 9000 para acesso do Nginx
EXPOSE 9000
CMD ["php-fpm"]
