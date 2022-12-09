#!/bin/sh

echo "Hello from entrypoint.sh"

# Composer install
make install env=${INSTALL_ENV}
# Important pour la destruction du conteneur puisque le dossier vendor appartiendra à root
chmod -R 777 vendor

echo "Lancement de php-fpm"
php-fpm
