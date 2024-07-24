# PHP Version
FROM php:8.1-apache

ARG NODE_VERSION=20

RUN apt-get update -yqq \
    && apt-get install -yqq \
    ca-certificates \
    git \
    gcc \
    make \
    wget \
    mc \
    curl \
    supervisor \
    sendmail \
    libmcrypt-dev \
    libxml2-dev \
    libxslt-dev \
    libldb-dev \
    libldap2-dev \
    libpng-dev \
    libzip-dev \
    zip \
    vim

RUN apt-get update && apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap
#RUN pecl install mcrypt-1.0.4
#RUN docker-php-ext-enable mcrypt

## Install php extension
RUN apt-get update -yqq \
    && apt-get install -yqq
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-install opcache
RUN docker-php-ext-install soap 
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl
RUN docker-php-ext-install ldap
RUN docker-php-ext-install gd
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN apt-get install pkg-config

## JPG support
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

## Install composer globally
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN echo "Install composer globally"
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

## Install nodejs
# RUN curl -sL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - \
#     && apt-get install -y nodejs \
#     && npm install -g npm
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
    && . ~/.bashrc \
    && nvm install ${NODE_VERSION}
# RUN nvm use ${NODE_VERSION}

# Copy config files for php fpm and php cli
# COPY php.ini /etc/php/cli/php.ini
# COPY php.ini /etc/php/apache2/php.ini
# COPY php.ini /usr/local/etc/php/php.ini

# Fix Alias /icons/
RUN sed -i 's/Alias/#Alias/' /etc/apache2/mods-available/alias.conf

# Docker entrypoint for sendmail
RUN sed -i '/#!\/bin\/sh/aservice sendmail restart' /usr/local/bin/docker-php-entrypoint

RUN sed -i '/#!\/bin\/sh/aecho "$(hostname -i)\t$(hostname) $(hostname).localhost" >> /etc/hosts' /usr/local/bin/docker-php-entrypoint

# User permissions
RUN usermod -aG www-data www-data

# Enable mod_rewrite
RUN a2enmod rewrite

# Enable headers module
RUN a2enmod headers

# Set working directory
WORKDIR /var/www/

