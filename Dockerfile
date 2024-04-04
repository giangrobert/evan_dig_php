FROM php:8.3-apache

# Configura el DocumentRoot a la carpeta publicas
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update && apt-get install -y sqlite3 && rm -rf /var/lib/apt/lists/*
RUN a2enmod rewrite
RUN echo '<Directory "/var/www/html">' > /etc/apache2/conf-available/override.conf && \
    echo '    AllowOverride All' >> /etc/apache2/conf-available/override.conf && \
    echo '</Directory>' >> /etc/apache2/conf-available/override.conf && \
    a2enconf override && \
    service apache2 restart



# Copia los archivos de la aplicación al contenedor
COPY core/ /var/www/html/core/
COPY app/ /var/www/html/app/
COPY public/ /var/www/html/public/

# Asegúrate de que todos los archivos pertenecen al usuario www-data
RUN chown -R www-data:www-data /var/www

EXPOSE 80
