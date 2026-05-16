FROM php:8.2-fpm

# 1. Install dependensi sistem, Nginx, dan edisi PHP untuk Laravel
RUN apt-get update && apt-get install -y \
    nginx \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 2. HAPUS TOTAL semua konfigurasi bawaan Nginx agar tidak menimpa Laravel
RUN rm -f /etc/nginx/sites-enabled/default \
    && rm -f /etc/nginx/sites-available/default \
    && rm -rf /var/www/html/*

# 3. Buat konfigurasi Nginx baru langsung ke folder default utama
RUN echo 'server { \n\
    listen 80 default_server; \n\
    listen [::]:80 default_server; \n\
    root /var/www/html/public; \n\
    index index.php index.html; \n\
    charset utf-8; \n\
    location / { \n\
        try_files $uri $uri/ /index.php?$query_string; \n\
    } \n\
    location = /favicon.ico { access_log off; log_not_found off; } \n\
    location = /robots.txt  { access_log off; log_not_found off; } \n\
    error_page 404 /index.php; \n\
    location ~ \.php$ { \n\
        include fastcgi_params; \n\
        fastcgi_pass 127.0.0.1:9000; \n\
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \n\
    } \n\
    location ~ /\.(?!well-known).* { \n\
        deny all; \n\
    } \n\
}' > /etc/nginx/sites-enabled/default

# 4. Set folder kerja di dalam server
WORKDIR /var/www/html

# 5. Copy seluruh isi proyek kamu ke dalam kontainer
COPY . .

# ... (bagian atas biarkan tetap utuh sama seperti sebelumnya) ...

# 6. Install Composer dan dependensi Laravel
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# === TAMBAHKAN BARIS INI (PENTING) ===
# Memaksa Laravel membuang semua cache konfigurasi lokal laptop saat berada di server cloud
RUN php artisan config:clear && php artisan cache:clear && php artisan route:clear

# 7. Atur hak akses folder agar Laravel tidak Error 500
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD php-fpm -D && nginx -g "daemon off;"
