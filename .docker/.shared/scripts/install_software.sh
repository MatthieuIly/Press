#!/bin/sh

#apt-get update -yqq && apt-get install -yqq \
#    curl \
#    dnsutils \
#    gdb \
#    git \
#    htop \
#    iproute2 \
#    iputils-ping \
#    ltrace \
#    make \
#    procps \
#    strace \
#    sudo \
#    sysstat \
#    unzip \
#    vim \
#    wget \
#    nano \
#;

apt-get update -yqq \
    && apt-get install -yqq --no-install-recommends \
        libmemcached-dev  \
        libfreetype6-dev \
        libxml2-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zlib1g-dev \
        libzip-dev \
        libz-dev \
        libpq-dev  \
        libsqlite3-dev  \
        libicu-dev \
        g++ \
        git \
        zip \
        libmcrypt-dev \
        libvpx-dev \
        libjpeg-dev \
        libpng-dev \
        bzip2 \
        wget \
        libexpat1-dev \
        libbz2-dev \
        libgmp3-dev \
        libldap2-dev \
        unixodbc-dev \
        libpcre3-dev \
        libtidy-dev \
        libaspell-dev \
        tar \
        less \
        nano \
        libcurl4-gnutls-dev \
        apt-utils \
        libxrender1 \
        unzip \
        libonig-dev \
        libldap2-dev \
        libxslt-dev \
        libwebp-dev \
        libc-client-dev \
        libkrb5-dev \
        libpspell-dev \
        librabbitmq-dev \
        sudo \
        npm

curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt install -y nodejs
npm install -g npm@9.1.2
