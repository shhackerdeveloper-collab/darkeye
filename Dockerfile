# Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Salin semua file ke dalam container
COPY . /var/www/html/

# Buka port 80 (default HTTP)
EXPOSE 80