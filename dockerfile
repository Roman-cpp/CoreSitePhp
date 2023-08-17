FROM php:8.2-fpm
COPY . /var/www/html
EXPOSE 8080
WORKDIR /var/www/html
CMD ["php", "index.php"]