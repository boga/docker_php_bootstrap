FROM php:fpm-alpine
MAINTAINER Ivan Shnurchenko <ivan.shnurchenko>

RUN apk update \
 && apk add libmcrypt-dev \
 && apk add coreutils autoconf gcc libc-dev make \
 && true

RUN pecl install xdebug

RUN docker-php-ext-install -j$(nproc) mcrypt 
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install exif
RUN docker-php-ext-install opcache
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable xdebug

# xdebug port
EXPOSE 9000

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=/usr/local/bin
RUN ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
RUN php -r "unlink('composer-setup.php');"

COPY conf/ /usr/local/etc/php-fpm.d/
CMD ["php-fpm"]
