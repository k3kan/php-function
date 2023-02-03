FROM php

WORKDIR /app

RUN apt-get -y update
RUN apt-get -y install git

COPY . .

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

CMD ["make", "install"]
CMD ["make", "test"]