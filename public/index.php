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

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);

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
        $response->setContent('Accès espace admin sur SERVER_NAME : '. $_SERVER['SERVER_NAME']);
        echo'<br/>';
        break;
    case '/article/1234':
        echo'<br/>';
        $response->setContent('Accès espace article sur SERVER_NAME : '. $_SERVER['SERVER_NAME']);
        echo'<br/>';
        break;
    default:
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        break;
}

$response->send();
$kernel->terminate($request, $response);
