#!/bin/sh

## add wget
#apt-get update -yqq && apt-get -f install -yyq wget
#
## download helper script
## @see https://github.com/mlocati/docker-php-extension-installer/
#wget -q -O /usr/local/bin/install-php-extensions https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions \
#    || (echo "Failed while downloading php extension installer!"; exit 1)
#
## install extensions
#chmod uga+x /usr/local/bin/install-php-extensions && sync && install-php-extensions \
#    opcache \
#    xdebug \
#;

phpModules=" \
        bcmath \
        bz2 \
        calendar \
        exif \
        gd \
        gettext \
        imap \
        intl \
        ldap \
        mysqli \
        opcache \
        pcntl \
        pdo_mysql \
        pdo_pgsql \
        pgsql \
        pspell \
        shmop \
        soap \
        sockets \
        sysvmsg \
        sysvsem \
        sysvshm \
        tidy \
        xsl \
        zip \
    " \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install -j$(nproc) $phpModules
