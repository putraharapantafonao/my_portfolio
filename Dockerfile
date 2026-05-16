FROM php:8.2-apache

# 1. Install dependensi sistem & ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 2. Aktifkan modul Apache Rewrite (wajib untuk routing Laravel)
RUN a2enmod rewrite

# 3. Ubah Document Root Apache agar langsung mengarah ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Set folder kerja di dalam server
WORKDIR /var/www/html

# 5. Copy seluruh isi proyek kamu ke dalam server Docker
COPY . .

# 6. Install Composer secara otomatis di dalam Docker
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 7. Berikan hak akses (permission) folder storage agar Laravel tidak Error 500
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80
