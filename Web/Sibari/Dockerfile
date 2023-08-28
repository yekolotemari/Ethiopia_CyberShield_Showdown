FROM php:8.0-apache

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY src/ /var/www/html
RUN chown -R www-data:www-data /var/www/html
#RUN chmod 777 /var/www/html
RUN chgrp -R www-data /var/www/html/
RUN chmod -R g+rw /var/www/html/

WORKDIR /var/www/html

COPY apache2.conf /etc/apache2/sites-available/my-apache-site.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf && a2enmod rewrite && a2dissite 000-default && a2ensite my-apache-site && service apache2 restart

COPY .htaccess /var/www/html 


RUN service apache2 restart
#RUN a2enmod php7.4

COPY script.sh .
RUN chmod +x script.sh 
RUN bash script.sh

EXPOSE 80 
CMD ["apache2-foreground"]
