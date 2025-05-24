# Étape 1 : récupérer composer depuis une image officielle
FROM composer:2 AS composer_stage

# Étape 2 : image PHP officielle avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Activer mod_rewrite pour Symfony
RUN a2enmod rewrite

# Copier Composer depuis la 1ʳᵉ étape
COPY --from=composer_stage /usr/bin/composer /usr/bin/composer

# Copier le code de l'application Symfony
COPY . /var/www/html/

WORKDIR /var/www/html

# Installer les dépendances PHP sans les packages de dev
RUN composer install --no-dev --optimize-autoloader

# Définir les bonnes permissions
RUN chown -R www-data:www-data /var/www/html/var /var/www/html/vendor

# Copier la config Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
