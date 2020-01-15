FROM pagevamp/nginx-php7-fpm:7.2-stage
ADD ./docker/sites/default-live.conf /etc/nginx/sites-enabled/default
ADD ./docker/conf/supervisord.conf /supervisord.conf
RUN cat /supervisord.conf >> /etc/supervisor/conf.d/supervisord.conf
WORKDIR /var/www
ADD ./ /var/www/
RUN touch /var/www/storage/logs/laravel.log
RUN composer install && composer du -o
RUN chown -Rf www-data.www-data /var/www/
RUN php artisan storage:link
#RUN cp .env.example .env && php artisan key:generate && vendor/bin/phpunit && rm .env
EXPOSE 80
ENTRYPOINT ["/bin/bash","/start.sh"]

