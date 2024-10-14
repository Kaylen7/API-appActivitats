# Use PHP 8.3 with FPM (FastCGI Process Manager)
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Install necessary PHP extensions for Laravel and MySQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer (for dependency management)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy application code to the container
COPY . .

# Install Laravel dependencies using Composer
RUN composer install

# Set appropriate file permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Expose port 9000 (PHP-FPM default port)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
