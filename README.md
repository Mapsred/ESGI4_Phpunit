# SeleniumBehat

## Installation
copy ``docker-compose.yml.dist`` to ``docker-compose.yml``

copy ``.env.dist`` to ``.env``

Replace what you want to

### With Docker-Compose

Run ``docker-compose up`` to build the network

Then run 

* ``docker-compose exec php-fpm composer install`` To install composer dependencies

### Without Docker-Compose

Run

* ``composer install`` To install composer dependencies

### Finally

You are ready to go !

Now you can run selenium : ``./bin/selenium``

And the behat tests : ``vendor/bin/behat --append-snippets``
