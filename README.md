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
Émulateur de navigateur

### Behat
Framework de test

Lien de la documentation : http://behat.org/en/latest/quick_start.html

### Mink
Extension de Behat.

Module pour effectuer les tests dans le navigateur. (assertions)

### Symfony dot env
Gère les paramètres du projet comme des variables d'environnement.

## Historique du projet

### composer.json 
Utilisation de "composer install/require" pour l'installation de Behat et Mink

### behat.yml 
Fichier de configuration de behat (ici généré par Symfony Flex lors de l'installation). 

Nous l'avons modifié pour l'adapter à nos besoins.

### chromedriver 
Driver servant à émuler un navigateur Google Chrome avec Selenium afin de réaliser les tests.

### FeatureContext 
Context Behat auquel a été ajouté l'extension Mink.

### Ecriture des test dans les features
Nous avons suivi le schéma du squelette fournis lors de l'installation.

Nous avons créé plusieurs fichiers afin de séparer les tests (features) et les rendre plus lisibles.

### bin/selenium (sh file)
Raccourci pour l'éxecution de selenium (*bin/selenium-server-standalone-3.8.0.jar*) avec le driver chrome (*bin/chromedriver.exe*)

Commande entière présente dans le fichier :
``java -Dwebdriver.chrome.driver=bin/chromedriver.exe -jar bin/selenium-server-standalone-3.8.0.jar)``
