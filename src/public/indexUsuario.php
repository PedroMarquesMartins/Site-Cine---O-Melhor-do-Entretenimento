<?php
require_once '../config/db.php';
require_once '../controllers/usuarioController.php';
require_once '../Router.php';

$router = new Router();
$usuarioController = new usuarioController($pdo);

header("Content-type: application/json; charset=UTF-8");

$router->add('GET','/USUARIO', [$usuarioController, 'list']);
$router->add('GET','/USUARIO/{id}', [$usuarioController, 'getById']);
$router->add('REMOVE','/USUARIO/{id}', [$usuarioController, 'delete']);
$router->add('POST','/USUARIO', [$usuarioController, 'getById']);
$router->add('PUT','/USUARIO', [$usuarioController, 'getById']);

$requestedPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathItems = explode("/", $requestedPath);
$requestedPath = "/" . $pathItems[3] . ($pathItems[4] ? "/" . $pathItems[4] : "");

$router->dispatch($requestedPath);