# Base image
FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

USER root

# Install system dependencies
RUN apt-get update && apt-get install -y \
  git \
  curl \
  libpng-dev \
  libjpeg-dev \
  libjpeg62-turbo-dev \
  libmcrypt-dev \
  libgd-dev \
  jpegoptim optipng pngquant gifsicle \
  libonig-dev \
  libxml2-dev \
  zip \
  libcap2-bin \
  libpng-dev \
  unzip \
  libzip-dev


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --enable-gd --with-freetype=/usr/include/freetype2/ --with-jpeg=/usr/include/
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
# RUN useradd -G www-data,root -u $uid -d /home/$user $user
# RUN mkdir -p /home/$user/.composer && \
# chown -R $user:$user /home/$user

RUN chown -R www-data:www-data /var/www


RUN chown -R www-data:www-data /var/www

# RUN chown -R $USER:$USER .

#RUN chmod -R 755 /var/www/html/storage

#RUN chown -R www-data:www-data /var/www/html/storage

WORKDIR /var/www

RUN php --version
RUN composer --version
EXPOSE 8000
EXPOSE 2525
CMD [ "sh", "-c", "composer install -o ;php artisan key:generate;php artisan storage:link; php artisan migrate; php artisan serve  --host=0.0.0.0 --port=8000"]