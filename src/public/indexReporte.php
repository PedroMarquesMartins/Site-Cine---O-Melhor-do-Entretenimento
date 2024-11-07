<?php
require_once '../config/db.php';
require_once '../controllers/reporteController.php';
require_once '../Router.php';

$router = new Router();
$reporteController = new reporteController($pdo);

header("Content-type: application/json; charset=UTF-8");

$router->add('GET','/REPORTE',[$reporteController, 'list']);
$router->add('GET','/REPORTE/{id}', [$reporteController, 'getById']);
$router->add('REMOVE','/REPORTE/{id}', [$reporteController, 'delete']);
$router->add('POST','/REPORTE', [$reporteController, 'getById']);
$router->add('PUT','/REPORTE', [$reporteController, 'getById']);

$requestedPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathItems = explode("/", $requestedPath);
$requestedPath = "/" . $pathItems[3] . ($pathItems[4] ? "/" . $pathItems[4] : "");

$router->dispatch($requestedPath);