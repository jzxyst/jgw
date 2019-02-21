FROM php:7.3.0-fpm

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NOWARNINGS yes
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# 必要なパッケージのインストール
RUN apt-get update \
	&& apt-get install -y zlib1g-dev libzip-dev unzip \
	&& docker-php-ext-install zip \
	&& pecl install xdebug-2.7.0beta1 \
	&& docker-php-ext-enable xdebug

# composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
	&& php composer-setup.php \
	&& php -r "unlink('composer-setup.php');" \
	&& mv composer.phar /usr/local/bin/composer

# node.jsのインストール
#RUN curl -sL https://deb.nodesource.com/setup_6.x | bash - \
#    && apt-get update \
#    && apt-get install -y nodejs

# Laravelのインストール
WORKDIR /src
#RUN composer global require "laravel/installer"

# library setup
WORKDIR /src/laravel
#RUN composer install

# permissionの設定
#RUN chmod -R 777 \
#	/var/www/storage \
#	/var/www/bootstrap/cache

# Laravel setup
#RUN php artisan key:generate \
#	&& php artisan config:clear \
#	&& php artisan config:cache \
#	&& php artisan optimize