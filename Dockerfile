# Use an official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy Laravel files (including .env.example)
COPY . /var/www/html

# Ensure .env file is present (if not, create it from .env.example)
RUN if [ ! -f /var/www/html/.env ]; then cp /var/www/html/.env.example /var/www/html/.env; fi

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct Apache document root to Laravel's public folder
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set ServerName to avoid warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Enable Apache mod_rewrite for Laravel routes
RUN a2enmod rewrite

# Give necessary permissions for storage and cache, and run artisan commands
RUN chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache && \
    php artisan key:generate && \
    php artisan config:clear && \
    php artisan cache:clear

# Ensure Apache listens on the correct port
RUN sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/<VirtualHost \*:80>/<VirtualHost *:10000>/' /etc/apache2/sites-available/000-default.conf

# Expose the correct port
EXPOSE 10000

# Start Apache (Remove `artisan serve`)
CMD ["apache2-foreground"]
