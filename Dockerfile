#Image de base
FROM php:7.3-apache

#Image de base
LABEL version="1.0" maintainer="DIALLO Mafouz mafouzdiallo@gmail.com>"

#Installation des modules php
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip



#Telechargement et installation de composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Definition du dossier de travail
WORKDIR  /var/www/html

#Creer le fichier de configuration laravel
CMD touch /var/www/html/.env

#Copier le contenu du fichier de production
COPY env.production /var/www/html/.env

#Copier le projet laravel
ADD . .

#Installer les outils
#RUN composer install

#Donner les droits d'acces a l'utilisateur
#RUN chown -R www-data:www-data /var/www

#Ouvrir le port 80
EXPOSE 80

#Executer les migrations et demarer le serveur
ENTRYPOINT php artisan migrate && php -S 0.0.0.0:8000