# Use an official PHP runtime as the base image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any needed dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy .env file (optional for development)
# COPY .env .

# Install Composer dependencies
RUN composer install

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Copy .htaccess file to redirect all traffic to public/index.php
COPY .htaccess /var/www/html/.htaccess

# Expose port 80 to the outside world
EXPOSE 80

# Command to run the PHP application
CMD ["apache2-foreground"]
