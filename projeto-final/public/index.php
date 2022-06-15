<?php

include '../vendor/autoload.php';


use App\Controller\ErrorController;

$url = explode('?',$_SERVER['REQUEST_URI'])[0];

$routes = include '../config/routes.php';




if (false === isset($routes[$url])) {
    (new ErrorController())->notFoundAction();

    exit;
}
$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())->$methodName();
