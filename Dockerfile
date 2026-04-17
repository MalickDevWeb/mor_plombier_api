FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libsqlite3-dev \
    pkg-config

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Create SQLite database if it doesn't exist
RUN touch database/database.sqlite
RUN chmod 666 database/database.sqlite
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 8000 and start application
EXPOSE 8000
CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8000
