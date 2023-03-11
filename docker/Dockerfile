FROM php:8.2-cli AS base

# Install system requirements
RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \
        zip \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libbz2-dev \
        libwebp-dev \
        libzip-dev; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install php requirements
RUN docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install \
        bcmath \
        bz2 \
        exif \
        gd \
        opcache \
        pcntl \
        sockets \
        zip

# Install php requirements with pecl
RUN pecl install swoole-5.0.2 \
    && docker-php-ext-enable swoole

# Get Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV PHP_INI_DIR "/etc/php/8.2/cli"

FROM base as development

WORKDIR /var/www

COPY run.sh /run.sh
RUN chmod +x /run.sh

EXPOSE 8080

CMD ["/run.sh"]