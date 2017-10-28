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

COPY conf/ /usr/local/etc/php-fpm.d/
CMD ["php-fpm"]
