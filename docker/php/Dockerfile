FROM php:7.3.0-fpm

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NOWARNINGS yes
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# 必要なパッケージのインストール
RUN apt-get update \
    && apt-get install -y zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install zip

# composerのインストール
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#  && php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" \
  && mv composer.phar /usr/local/bin/composer

# node.jsのインストール
#RUN curl -sL https://deb.nodesource.com/setup_6.x | bash - \
#    && apt-get update \
#    && apt-get install -y nodejs

# Laravelのインストール
WORKDIR /src
RUN composer global require "laravel/installer"