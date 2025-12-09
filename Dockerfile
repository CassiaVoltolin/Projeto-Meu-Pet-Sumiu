FROM php:8.5-apache

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && rm -rf /var/lib/apt/lists/*

# Instala extensões PDO, PDO MySQL e GD
RUN docker-php-ext-install pdo pdo_mysql

# Configuração do GD com suporte a JPEG e FreeType
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    && docker-php-ext-install gd

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite no Apache
RUN a2enmod rewrite

# Define o diretório de trabalho
WORKDIR /var/www/html

# Permissões (opcional)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
