FROM php:8.2-fpm

# 1. Install dependensi sistem, Nginx, edisi PHP, dan Node.js (untuk compile Vite)
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 2. Hapus konfigurasi bawaan Nginx agar tidak menimpa Laravel
RUN rm -f /etc/nginx/sites-enabled/default \
    && rm -f /etc/nginx/sites-available/default \
    && rm -rf /var/www/html/*

# 3. Buat konfigurasi Nginx baru langsung ke folder default secara presisi
RUN echo 'server { \
    listen 80 default_server; \
    listen [::]:80 default_server; \
    root /var/www/html/public; \
    index index.php index.html; \
    charset utf-8; \
    location / { \
        try_files $uri $uri/ /index.php?$query_string; \
    } \
    location = /favicon.ico { access_log off; log_not_found off; } \
    location = /robots.txt  { access_log off; log_not_found off; } \
    error_page 404 /index.php; \
    location ~ \.php$ { \
        include fastcgi_params; \
        fastcgi_pass 127.0.0.1:9000; \
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
    } \
    location ~ /\.(?!well-known).* { \
        deny all; \
    } \
}' > /etc/nginx/sites-enabled/default

# 4. Set folder kerja di dalam server
WORKDIR /var/www/html

# 5. Copy seluruh isi proyek kamu ke dalam kontainer
COPY . .

# 6. Install Composer dan dependensi Laravel secara bersih
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 7. Install NPM dan Compile Aset Tailwind/Vite langsung di dalam server
RUN npm install \
    && npm run build

# 8. Atur hak akses folder agar Laravel tidak Error 500
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# 9. Jalankan optimasi Laravel, jalankan migrasi aman, lalu nyalakan server!
CMD php artisan config:clear \
    && php artisan cache:clear \
    && php artisan view:clear \
    && php artisan migrate --force \
    && php-fpm -D \
    && nginx -g "daemon off;"
