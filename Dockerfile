FROM node:18-alpine as node

WORKDIR /var/www
COPY package*.json .

RUN npm install
COPY . .


# COPY /public/build/manifest.json /var/www/public/build

CMD [ "npm", "run", "build"]


FROM php:8.1 as php

RUN apt-get update -y
RUN apt-get install -y unzip libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

# RUN pecl install -o -f redis \
#     && rm -rf tmp/pear \
#     && docker-php-ext-enable redis

WORKDIR /var/www
COPY . .

COPY --from=node /var/www/public/build /var/www/public/build
COPY --from=composer:2.5.1 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]

FROM node:18-alpine as node

WORKDIR /var/www
COPY package*.json .

RUN npm install
RUN npm start
CMD ["vite", "build"]

# COPY /public/build/manifest.json /var/www/public/build
