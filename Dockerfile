FROM php:8.2-apache

# Instala extensões necessárias para o MySQL
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilita o mod_rewrite do Apache para URLs amigáveis
a2enmod rewrite

EXPOSE 80