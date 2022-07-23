FROM wyrihaximusnet/php:7.4-nts-alpine

RUN mkdir -p /opt/app/socketo.me
WORKDIR /opt/app/socketo.me

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN rm composer-setup.php
RUN chmod +x composer.phar

COPY bin bin
COPY src src
#COPY views views
#COPY web web
COPY composer.json ./
COPY composer.lock ./
RUN ./composer.phar install --ansi --no-interaction --prefer-dist -o --no-scripts --no-plugins
RUN rm composer.phar

ENTRYPOINT ["php"]
CMD ["bin/run-all-the-things.php"]
