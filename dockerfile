FROM php:8.1-apache

# 1. Activation de mod_rewrite pour Symfony
RUN a2enmod rewrite

# 2. Installation des paquets systèmes et drivers PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    && docker-php-ext-install pdo_pgsql

# 3. Installation de Composer 2.2 LTS (compatible avec symfony/flex v2.1.4)
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# 4. Installation de Node.js (pour Webpack Encore / Vue.js)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# 5. Configuration d'Apache (pointer vers le dossier public/ de Symfony)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 6. Copie du code source et du script de démarrage
WORKDIR /var/www/html
COPY . .

# 7. Configuration de l'environnement de build pour Composer et Symfony
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV APP_ENV=prod

# 8. Installation des dépendances et compilation (sans la ligne composer config)
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install
RUN npm run build

# 9. Permissions pour Symfony et le script
RUN chown -R www-data:www-data /var/www/html/var
RUN chmod +x start.sh

# 10. Utilisation du script comme point d'entrée
CMD ["./start.sh"]