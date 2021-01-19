<!-- TOC -->

- [PHP SYMFONY](#php-symfony)
- [Prerequis](#prerequis)
    - [Installer Composer](#installer-composer)
    - [Installer Symfony](#installer-symfony)
    - [Installation projet symfony website avec composer](#installation-projet-symfony-website-avec-composer)
    - [Installation projet symfony website avec symfony](#installation-projet-symfony-website-avec-symfony)
    - [Installation Web serveur apache](#installation-web-serveur-apache)
    - [Installer Doctrine](#installer-doctrine)
    - [Verifier votre environnement](#verifier-votre-environnement)
    - [Creation d'une base de donnee mysql par doctrine](#creation-dune-base-de-donnee-mysql-par-doctrine)
    - [Version php installe](#version-php-installe)
    - [Controle de l'installation de symfony](#controle-de-linstallation-de-symfony)
    - [Installation OpCache](#installation-opcache)
    - [Installation de package recommande exemple intl](#installation-de-package-recommande-exemple-intl)
    - [Installation package http-foundation](#installation-package-http-foundation)
    - [Php.ini](#phpini)
    - [Debug mode](#debug-mode)
    - [Nettoyage du cache Clear Cache](#nettoyage-du-cache-clear-cache)
    - [Lors de la recuperation d'un projet github](#lors-de-la-recuperation-dun-projet-github)
    - [Demarrage de l'application](#demarrage-de-lapplication)
    - [Arret de l'application](#arret-de-lapplication)
- [Realisez votre premiere page](#realisez-votre-premiere-page)
    - [HttpFoundation](#httpfoundation)
        - [Exemple d'utilisation du component HttpFoundation avec ces classes Request et Response](#exemple-dutilisation-du-component-httpfoundation-avec-ces-classes-request-et-response)
    - [Routing](#routing)
        - [Exemple d'utilisation du component Routing](#exemple-dutilisation-du-component-routing)
    - [Le controleur front symfony component HttpKernel](#le-controleur-front-symfony-component-httpkernel)
        - [Exemple de http_kernel](#exemple-de-http_kernel)
    - [Realisez une application configurable et extensible](#realisez-une-application-configurable-et-extensible)
        - [Construction d'un objet recuperable a l'aide de service (Container service)](#construction-dun-objet-recuperable-a-laide-de-service-container-service)
- [Bug fixe](#bug-fixe)

<!-- /TOC -->

# PHP SYMFONY

# Prerequis

## Installer Composer

[Composer](https://getcomposer.org/download/)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>composer --version

// Retourne la version de composer
Composer version 2.0.8 2020-12-03 17:20:38
```

## Installer Symfony

[Symfony](https://symfony.com/download)

```cmd
D:\PROGRAMMING\PHP_SYMFONY>symfony -v

// Retourne la version de symfony cli ainsi que les lignes de commandes de bases
Symfony CLI version v4.21.6
```

## Installation projet symfony website avec composer

```cmd
composer create-project symfony/website-skeleton mon-super-projet
```

![installation de symfony](ressources/create_projet.PNG)

## Installation projet symfony website avec symfony

Creer un nouveau projet symfony

```cmd
symfony new [projet]
```

## Installation Web serveur apache

[Symfony apache](https://symfony.com/doc/current/setup/web_server_configuration.html#web-server-apache-mod-php)

```cmd
composer require symfony/apache-pack
```

Dans le cas d'une installation sur WAMPServer cliquer sur le bouton Wamp>Apache>httpd-vhosts.conf puis editer le fichier pour lui indiquer le dossier du site. Puis redemarrer les services Wampserver.


Puis suivre les instructions pour configurer le server apache (fichier.htaccess) dans le cas d'une utilisation from scratch.


## Installer Doctrine

```cmd
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
```

Configurer votre environnement pour que Doctrine se connecte a WAMP/MAMP/XAMP...

Dans .env

```env
DATABASE_URL="mysql://root:root@localhost:3306/symfony?serverVersion=5.7.24"
```

> En indiquant le nom 'symfony' sur la configuration de la connexion, alors Doctrine creera une base de donnees de ce nom dans le cas d'utilisation de la commande de creation de base de donnee doctrine: `php bin/console doctrine:database:create`


Dans doctrine.yaml

```yaml
doctrine:
  dbal:
    url: "%env(resolve:DATABASE_URL)%"
    driver: pdo_mysql
```

Cela Pointera sur la configuration du fichier .env


## Verifier votre environnement

```cmd
php bin/console about
```

![about_symfony](ressources/about_symfony.png)

## Creation d'une base de donnee mysql par doctrine

```
php bin/console doctrine:database:create
// cela vas creer la base de donnee mentionne ci-dessus, cad, symfony
Configure precedemment ici DATABASE_URL="mysql://root:root@localhost:3306/symfony?serverVersion=5.7.24" dans .env

```

## Version php installe

```cmd
symfony local:php:list
```

![php_version](ressources/php_version.png)

## Controle de l'installation de symfony

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

## Installation OpCache

Dans php.ini

```ini
[opcache]
zend_extension="C:\wamp64\bin\php\php7.4.9\ext\php_opcache.dll"
```

## Installation de package recommande exemple intl

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

## Installation package http-foundation

[http-foundation](https://symfony.com/doc/current/components/http_foundation.html)

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
APP_DEBUG=1
```

## Nettoyage du cache Clear Cache

```cmd
php bin/console c:c
```

## Lors de la recuperation d'un projet github

**Imperatif** executer la commande ci-dessous vous permettra de charger le fichier .env

```cmd
composer require symfony/dotenv
```


## Demarrage de l'application

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

## Arret de l'application

Ctrl+C

# Realisez votre premiere page

## HttpFoundation

[http_foundation](https://symfony.com/doc/current/components/http_foundation.html)

- Le framework Symfony est construit autour du paradigme fondamental du web : un utilisateur fait une requete et le serveur (ici, Symfony) doit retourner une reponse.
- Le composant `HttpFoundation` fournit une abstraction PHP objet pour la requete et la reponse.
- Le composant `HttpKernel` a la responsabilite de recuperer la requete de l'utilisateur et de renvoyer une reponse.
- Dans la tres grande majorite des applications, la reponse du serveur sera differente selon l’URL a laquelle il sera accede et fera appel a une fonction differente pour retourner un resultat.
- Un controleur Symfony peut etre une simple fonction d'une classe PHP et il est possible de configurer le routing a l'aide d'annotations PHP meme si d'autres formats de declaration sont possibles.
- Le framework Symfony non seulement a un composant pour gerer le routing, mais fournit aussi un controleur frontal en charge de recevoir toutes les requetes de l'utilisateur et de trouver la bonne action (fonction) du controleur a executer.

### Exemple d'utilisation du component HttpFoundation avec ces classes Request et Response

Cela permet d'afficher 'Accueil' sur l'url '/' et 'Acces espace admin' sur l'url '/admin'.

Dans index.php

```php
<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require dirname(__DIR__) . '/vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

$request = Request::createFromGlobals();
$url = $request->getPathInfo();
$response = new Response();

switch ($url) {
    case '/':
        echo'<br/>';
        $response->setContent('Accueil sur SERVER_NAME : '. $_SERVER['SERVER_NAME']);
        echo'<br/>';
        break;
    case '/admin':
        echo'<br/>';
        $response->setContent('Acces espace admin sur SERVER_NAME : '. $_SERVER['SERVER_NAME']);
        echo'<br/>';
        break;
    case '/article/1234':
        echo'<br/>';
        $response->setContent('Acces espace article sur SERVER_NAME : '. $_SERVER['SERVER_NAME']);
        echo'<br/>';
        break;
    default:
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        break;
}

$response->send();
```

## Routing

La responsabilite de lier une URL a une action PHP revient au composant Routing.
Nous utiliserons les annotation mais existe de nombreux formats de declaration telque XML, YAML.

[routing](https://symfony.com/doc/current/routing.html)

### Exemple d'utilisation du component Routing

Dans controller.php

```php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{

    /**
     * Page d'accueil
     *
     * @Route("/",name="accueil")
     */
    public function home()
    {
    }

    /**
     * Page d'acces a un article
     *
     * @Route(
     * "/article/{$postId<\d+>}",
     * name="article",
     * methode={"GET})
     */
    public function showBlogPost($postId = 1)
    {
        // $postId est retrouve a partir de l'url
        // par ex /article/1234, alors $articleId = 1234
    }
}
```

L'utilisation de regex dans l'exemple precedent controlle que l'id passe en argument soit bien un nombre positif et par defaut sera egale a un (arg function)

Dans routes.yaml

```yaml
accueil:
path: /
controller: App\Controller\HelloController::home

admin:
path: /admin
controller: article:App\Controller\HelloController::admin

article:
path: /article/{postId}
controller: article:App\Controller\HelloController::showBlogPost
methods: GET
```

Outil de controle des routes

```cmd
php bin/console debug:router
```

![routing_debug_1](ressources\routing_debug_1.PNG)

Outil de controle d'une route

```cmd
php bin/console debug:router article
```

![routing_debug_1](ressources\routing_debug_2.PNG)

## Le controleur front symfony component HttpKernel

> Le composant HttpKernel fournit un processus structure pour convertir un Requesten un Responseen utilisant le composant EventDispatcher. Il est suffisamment flexible pour creer un framework full-stack (Symfony), un micro-framework (Silex) ou un systeme CMS avance (Drupal).

[http_kernel](https://symfony.com/doc/current/components/http_kernel.html)

### Exemple de http_kernel

Dans index.php

```php
<?php
use App\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);

$url = $request->getPathInfo();
$response = new Response();

// code url avec switch case voir precedemment ...

$response->send();
$kernel->terminate($request, $response);
```

## Realisez une application configurable et extensible

- Le framework Symfony integre les meilleures pratiques de developpement pour des applications puissantes, extensibles et faciles a maintenir.
- Nous avons d'abord vu comment deleguer la construction et la recuperation de nos objets au container de services.
- Grace a l'autowiring, l'essentiel du temps, nous n'avons rien de special a faire pour que nos objets soient automatiquement retrouves par le container et accessibles dans nos services et nos controleurs.
- L'autoconfiguration permet d'ajouter des tags a nos services s'ils implementent une interface specifique et les services tagues sont traites differemment par le framework.
- Utiliser la programmation evenementielle a l'aide du composant EventDispatcher.
- Le principal interet est que l'on peut changer le comportement d'une application sans en changer le code, et ajouter de nombreux comportements sur une meme action, sans pour autant que ces comportements soient lies entre eux.
- Nous avons vu que Symfony dispose de nombreux evenements natifs qui sont envoyes aux ecouteurs durant le cycle de vie de l'application.
- Enfin, il est egalement possible de creer et de "dispatcher" ses propres evenements metiers.
- Il faut creer l'evenement qui doit "implementer" la classe Event de Symfony, a laquelle on peut passer des informations au besoin. Ensuite, il suffit de faire appel a l'EventDispatcher pour envoyer l'information a tous les ecouteurs concernes.

### Construction d'un objet recuperable a l'aide de service (Container service)

Controle des services injectables (Autowired) deja presents

```cdm
php bin/console debug:autowiring
```

[dependency_injection](https://symfony.com/doc/current/components/dependency_injection.html)

Exemple d'objet dans src\Service\ComplexObject.php

```php
<?php
namespace App\Services;

class ComplexObject
{
    protected $foo;
    protected $bar;
    protected $baz;
    protected $other;

    public function __construct($foo, $bar, $baz, $other)
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;
        $this->other = $other;
    }

    public function doSomething()
    {
        return print_r('Service injecté');  
    }
}
```

Controle de l'integration de ce service

```cmd
php bin/console debug:container
// ou
php bin/console debug:container App\Services\ComplexObject
// ou pour voir les arguments
php bin/console debug:container App\Services\ComplexObject --show-arguments
```

![service](ressources\service.PNG)

Utiliser ce service

Exemple d'objet dans src\Controller\HelloController.php

```php
class HelloController extends AbstractController
{
    /**
     * Page d'accueil
     *
     * @Route("/",name="accueil")
     */
    public function home(ComplexObject $complexObjectInjected)
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $complexObjectInjected->doSomething();
        return $response;
    }

```

# Bug fixe

![bug_fix_1](ressources/bug_fix_1.PNG)

Il suffit de configurer son httpd.conf Apache dans l'interface Wamp par exemple et y mettre les donnees de connexion :
[web_server_configuration](https://symfony.com/doc/current/setup/web_server_configuration.html)

**TRES GROS RISQUE D'ECRIRE DANS LE MAUVAIS FICHIER PHP.INI A TRAVERS L'INTERFACE WAMPSERVER VIGILANT!!!!**
