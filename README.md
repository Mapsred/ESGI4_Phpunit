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

## Explication

### Selenium
Emulateur de navigateur

### Behat
Framework de test

Lien de la documentation : http://behat.org/en/latest/quick_start.html

### Mink
Extension de Behat.

Plugin de navigateur pour effectuer les tests. (asset)

### Symfony dot env
Emuler un serveur de test.

## Historique du projet

### composer.json 
Utilisation de "Composer install" pour l'installation de Behat et Mink

### behat.yml 
Générer par Symfony lors de l'installation. 

Nous l'avons modifier pour l'adapter à nos besoins.

### chromedriver 
Il fallait bien choisir un des navigateurs.

### Featurecontext 
Ajout de l'extend Mink dans Featurecontext

### Ecriture des test dans les features
Nous avons suivi le schéma du squelette fournis lors de l'installation.

Nous avons créer plusieurs fichiers afin de séparer les tests et les rendre plus lisibles.

### selenium-server-standalone
Pour éviter d'écrire : 
java -Dwebdriver.chrome.driver=bin/chromedriver.exe -jar bin/selenium-server-standalone-3.8.0.jar)
