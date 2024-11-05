# Stage 1: Node base
FROM node:21 AS node_base

# Stage 2: PHP with Apache
FROM php:8.3-apache AS web

# Install Additional System Dependencies and clear cache
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    default-mysql-client \
    curl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Install PHP extensions
RUN pecl install pcov \
    && docker-php-ext-install pdo_mysql zip

# Configure Apache DocumentRoot to point to Laravel's public directory
# and update Apache configuration files
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Create a non-root user and switch to it
RUN addgroup --system secgroup \
    && adduser --system --ingroup secgroup appuser

# Set npm cache directory to a location writable by appuser
ENV NPM_CONFIG_CACHE=/var/www/html/.npm-cache

# Ensure appuser has access to Node, npm, and the npm cache directory
RUN mkdir -p /var/www/html/.npm-cache \
    && chown -R appuser:secgroup /var/www/html

# Change ownership of the /var/www/html to appuser
RUN chown -R appuser:secgroup /var/www/html

# Switch to appuser
USER appuser

# Install composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy Node and npm from node_base
COPY --from=node_base /usr/local/bin /usr/local/bin
COPY --from=node_base /usr/local/lib /usr/local/lib

# Ensure appuser has access to Node and npm
ENV PATH="/usr/local/bin:${PATH}"

# Install project dependencies
RUN composer install --no-plugins --no-scripts

# Build node deps.
RUN rm -rf /var/www/html/node_modules \
    && npm i && npm run build
