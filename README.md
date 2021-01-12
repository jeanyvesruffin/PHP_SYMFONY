<!-- TOC -->

- [PHP SYMFONY](#php-symfony)
    - [Prerequis](#prerequis)
        - [Installer Composer](#installer-composer)
        - [Installer Symfony](#installer-symfony)
        - [Installation projet symfony website avec composer](#installation-projet-symfony-website-avec-composer)
        - [Installation projet symfony website avec symfony](#installation-projet-symfony-website-avec-symfony)
        - [Installation Web serveur apache](#installation-web-serveur-apache)
        - [Demarrage de l'application](#demarrage-de-lapplication)
        - [Arret de l'application](#arret-de-lapplication)
        - [Installer Doctrine](#installer-doctrine)
        - [Verifier votre environnement](#verifier-votre-environnement)
        - [Creation d'une base de donnee mysql par doctrine](#creation-dune-base-de-donnee-mysql-par-doctrine)
        - [Version php installe](#version-php-installe)
        - [Controle de l'installation de symfony](#controle-de-linstallation-de-symfony)
        - [Installation de package recommande exemple intl](#installation-de-package-recommande-exemple-intl)
    - [Php.ini](#phpini)
    - [Debug mode](#debug-mode)
    - [Structure du framework](#structure-du-framework)
    - [Realisez votre premiere page](#realisez-votre-premiere-page)

<!-- /TOC -->

# PHP SYMFONY

## Prerequis

### Installer Composer

[Composer](https://getcomposer.org/download/)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>composer --version

// Retourne la version de composer
Composer version 2.0.8 2020-12-03 17:20:38
```

### Installer Symfony
[Symfony](https://symfony.com/download)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>symfony -v

// Retourne la version de symfony cli ainsi que les lignes de commandes de bases
Symfony CLI version v4.21.6
```

### Installation projet symfony website avec composer

```cmd
composer create-project symfony/website-skeleton mon-super-projet
```

![installation de symfony](ressources/create_projet.PNG)

### Installation projet symfony website avec symfony

Creer un nouveau projet symfony

```cmd
symfony new [projet]
```

### Installation Web serveur apache 
[Symfony apache](https://symfony.com/doc/current/setup/web_server_configuration.html#web-server-apache-mod-php)

```cmd
composer require symfony/apache-pack
```

Puis suivre les instructions pour configurer le server apache (fichier.htaccess)

### Demarrage de l'application

Demarrage de l'application symfony

```cmd
cd  [projet]
symfony server:start
```
![symfony_accueil](ressources/symfony_accueil.png)

```cmd
symfony.exe server:ca:install
symfony serve -d
[OK] Web server listening
    The Web server is using PHP CGI 7.4.1
    http://127.0.0.1:8000
```
### Arret de l'application

Ctrl+C

### Installer Doctrine

```cmd
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```

Configurer votre environnement pour que Doctrine se connecte a WAMP/MAMP/XAMP...

Dans .env

```env
DATABASE_URL="mysql://root:root@localhost:3306/symfony?serverVersion=5.7.24"
```

Dans doctrine.yaml

```yaml
doctrine:
  dbal:
    url: "%env(resolve:DATABASE_URL)%"
    driver: pdo_mysql
```

### Verifier votre environnement

```cmd
php bin/console about
```

![about_symfony](ressources/about_symfony.png)

### Creation d'une base de donnee mysql par doctrine

```
php bin/console doctrine:database:create
// cela vas creer la base de donnee mentionne ci-dessus, cad, symfony
Configure precedemment ici DATABASE_URL="mysql://root:root@localhost:3306/symfony?serverVersion=5.7.24" dans .env

```

### Version php installe
```cmd
symfony local:php:list
```
![php_version](ressources/php_version.png)

### Controle de l'installation de symfony

```
symfony check:req
// retourne
Symfony Requirements Checker
~~~~~~~~~~~~~~~~~~~~~~~~~~~~
> PHP is using the following php.ini file:
C:\MAMP\bin\php\php7.4.1\php.ini
> Checking Symfony requirements:
.......................WWW........W
 [OK]
 Your system is ready to run Symfony projects
```

### Installation de package recommande exemple intl
```cmd
composer require symfony/intl
```
```ini
// Pensez a decommenter la ligne correspondante dans le fichier php.ini
extension=intl
```
Ajouter l'extension opcache

```ini
zend_extension="[your path to php7]\php7\ext\php_opcache.dll"
```
Installation package http-foundation

```
composer require symfony/http-foundation
```
## Php.ini
Ajouter / Controler ces lignes dans le fichier php.ini

Suivre dans le xdebug le [wizard](https://xdebug.org/wizard)

```ini 
zend_extension = c:\wamp64\bin\php\php7.4.9\ext\php_xdebug-3.0.2-7.4-vc15-x86_64.dll
xdebug.mode = debug
xdebug.start_with_request = yes
xdebug.client_port = 9000
```

## Debug mode

Dans .env
```.env
// set it to 1 to enable the debug mode
APP_DEBUG=0
```


## Structure du framework

## Realisez votre premiere page


 # Bug fixe

 ![bug_fix_1](ressources/bug_fix_1.PNG)

 Il suffit de configurer son httpd.conf Apache dans l'interface Wamp par exemple et y mettre les donnees de connexion :
[web_server_configuration](https://symfony.com/doc/current/setup/web_server_configuration.html)


**TRES GROS RISQUE D'ECRIRE DANS LE MAUVAIS FICHIER PHP.INI A TRAVERS L'INTERFACE WAMPSERVER VIGILANT!!!!**