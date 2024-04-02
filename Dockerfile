# Use the official PHP 7.4 image with Apache
FROM php:7.4-apache

# Update packages and install system dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

    # Copy your custom php.ini configuration; ensure the file exists in your Docker context
COPY ./php.ini /usr/local/etc/php/

RUN chmod -R 755 /var/www/html


# Add your application code to the container
COPY . /var/www/html

# Copy your Apache configuration file and enable site
COPY ./yummybar.conf /etc/apache2/sites-available/yummybar.conf


RUN a2dissite 000-default \
    && a2ensite yummybar \
    && a2enmod rewrite headers

# Use environment variables in Apache configuration
RUN { \
    echo 'SetEnv DB1_HOST ${DB1_HOST}'; \
    echo 'SetEnv DB1_NAME ${DB1_NAME}'; \
    echo 'SetEnv DB1_USER ${DB1_USER}'; \
    echo 'SetEnv DB1_PASSWORD ${DB1_PASSWORD}'; \
    echo 'SetEnv DB2_HOST ${DB2_HOST}'; \
    echo 'SetEnv DB2_NAME ${DB2_NAME}'; \
    echo 'SetEnv DB2_USER ${DB2_USER}'; \
    echo 'SetEnv DB2_PASSWORD ${DB2_PASSWORD}'; \
    echo 'SetEnv SITE_URL ${SITE_URL}'; \
  } > /etc/apache2/conf-enabled/environment.conf

# Configure Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Apache is already set to run in the foreground by the base image
EXPOSE 80
EXPOSE 443

