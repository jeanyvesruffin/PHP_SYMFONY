- [PHP SYMFONY](#php-symfony)
  - [Prerequis](#prerequis)

<!-- /TOC -->

# PHP SYMFONY

## Prerequis

Installer [Composer](https://getcomposer.org/download/)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>composer --version

// Retourne la version de composer
Composer version 2.0.8 2020-12-03 17:20:38
```

Installer [Symfony](https://symfony.com/download)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>symfony -v

// Retourne la version de symfony cli ainsi que les lignes de commandes de bases
Symfony CLI version v4.21.6
```

Installation projet symfony website

```cmd
composer create-project symfony/website-skeleton mon-super-projet
```

![installation de symfony](ressources/create_projet.PNG)

Demarrage de l'application

```cmd
cd  [projet]
php bin/console server:run
```

## Command line symfony et composer

Version php installe
```cmd
symfony local:php:list
```
![php_version](ressources/php_version.png)

Creer un nouveau projet symfony

```cmd
symfony new [projet]
```

Controle de l'installation symfony

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

Installation de package recommande exemple intl

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

Demarrage serveur

```cmd
symfony.exe server:ca:install
symfony serve -d
[OK] Web server listening
    The Web server is using PHP CGI 7.4.1
    http://127.0.0.1:8000
```

Installer Doctrine

```cmd
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```

Configurer votre environnement pour Doctrine connecte a MAMP

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

Verifier votre environnement

```cmd
php bin/console about
```

![about_symfony](ressources/about_symfony.png)

Creation d'une base de donnee mysql

```
php bin/console doctrine:database:create
// cela vas creer la base de donnee mentionne ci-dessus, cad, symfony
Configure precedemment ici DATABASE_URL="mysql://root:root@localhost:3306/symfony?serverVersion=5.7.24" dans .env

```

Installation package http-foundation

```
composer require symfony/http-foundation
```

## Structure du framework

## Realisez votre premiere page
