# Sử dụng image PHP chính thức với Apache
FROM php:7.2-apache

# Copy file PHP vào thư mục web
COPY index.php /var/www/html/

# Cấp quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

# Kích hoạt mod_rewrite của Apache nếu cần
RUN a2enmod rewrite

# Mở cổng 80 cho HTTP
EXPOSE 80
