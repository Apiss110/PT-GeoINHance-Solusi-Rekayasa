FROM richarvey/nginx-php-fpm:latest

# Salin seluruh isi project ke dalam server
COPY . /var/www/html

# Atur environment untuk production
ENV WEBROOT /var/www/html/public
ENV APP_ENV production

# Jalankan composer untuk install dependencies laravel
RUN composer install --no-dev --allow-plugins --optimize-autoloader

# Atur hak akses folder storage agar bisa ditulis oleh server
RUN chown -R www-data:www-data /var/www/html/storage