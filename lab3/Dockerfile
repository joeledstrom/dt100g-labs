FROM occitech/cakephp:5-apache

RUN apt-get update && apt-get install -y libpq-dev && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_pgsql

CMD ./docker-entrypoint.sh
