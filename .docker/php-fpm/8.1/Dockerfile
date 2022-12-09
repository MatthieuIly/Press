# phpfpm Service
FROM php:8.1-fpm-bullseye

LABEL maintainer="matthieu.ily@docaposte.fr"

COPY ./.shared/scripts/ /tmp/scripts/
RUN chmod +x -R /tmp/scripts/

# Set timezone
ARG TZ="Europe/Paris"
RUN /tmp/scripts/set_timezone.sh ${TZ}

RUN /tmp/scripts/install_software.sh

RUN /tmp/scripts/install_php_extensions.sh

# php config
COPY ./.shared/config/php/conf.d/*  /usr/local/etc/php/conf.d/

ENV XDEBUG_VERSION 3.1.5

#RUN apt-get -y update --fix-missing
#RUN apt-get -y install nano
#RUN apt-get -y install sudo
#RUN apt-get install -y procps && rm -rf /var/lib/apt/lists/*


# workdir
ARG APP_CODE_PATH="/var/www/current"
WORKDIR "$APP_CODE_PATH"

COPY --from=composer:2.4.2 /usr/bin/composer /usr/bin/composer
#COPY ../composer.json ./

# Bash
COPY ./php-fpm/.bashrc /root/.bashrc
COPY ./php-fpm/.bash_profile /root/.bash_profile

# Application
COPY . .

COPY ./php-fpm/docker-entrypoint.sh /
RUN chmod a+x /docker-entrypoint.sh

ENTRYPOINT [ "/docker-entrypoint.sh" ]
