# Étape 1 : Récupérer Composer
FROM composer:2 AS composer_stage

# Étape 2 : Image principale avec Apache + PHP 8.2
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Activer mod_rewrite pour Symfony
RUN a2enmod rewrite

# Copier Composer depuis l’étape précédente
COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

# Copier le code de l'application Symfony
COPY . /var/www/html/

WORKDIR /var/www/html

# Installer les dépendances PHP sans les packages de dev et sans auto-scripts
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Exécuter les commandes Symfony manuellement
RUN php bin/console cache:clear --no-warmup \
 && php bin/console importmap:install --no-interaction

# Définir les bonnes permissions
RUN chown -R www-data:www-data /var/www/html/var /var/www/html/vendor

# Config Apache (vhost personnalisé)
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
