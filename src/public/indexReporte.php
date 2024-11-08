<?php
require_once '../controllers/reporteController.php';

$reporteController = new reporteController($pdo);

$router->add('GET','/REPORTE',[$reporteController, 'list']);
$router->add('GET','/REPORTE/{id}', [$reporteController, 'getById']);
$router->add('REMOVE','/REPORTE/{id}', [$reporteController, 'delete']);
$router->add('POST','/REPORTE', [$reporteController, 'getById']);
$router->add('PUT','/REPORTE', [$reporteController, 'getById']);
