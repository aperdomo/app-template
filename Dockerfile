# Use PHP with Apache as the base image
FROM php:8.3-apache as web

# Set the working directory
WORKDIR /var/www/html

# Install Additional System Dependencies, Node.js, npm and clear cache
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    default-mysql-client \
    curl \
    && curl -sL https://deb.nodesource.com/setup_21.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Configure Apache DocumentRoot to point to Laravel's public directory
# and update Apache configuration files
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install composer and project dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
RUN composer install

# Copy the application code
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache
