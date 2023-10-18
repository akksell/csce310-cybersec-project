FROM php:7.4-apache
# download necessary extensions and enable them for codeigniter + php
RUN apt-get update \
    && apt-get install -y libicu-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install intl

# enable rewrites
RUN a2enmod rewrite
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# change the document root for apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# add spark to path
ENV PATH="${PATH}:/var/www/html/spark"

# Labels and versioning
LABEL version="1.0.0"