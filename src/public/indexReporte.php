<?php
require_once __DIR__  . '/../controllers/reporteController.php';

$reporteController = new reporteController($pdo);

$router->add('GET','/REPORTE',[$reporteController, 'list']);
$router->add('GET','/REPORTE/{id}', [$reporteController, 'getById']);
$router->add('DELETE','/REPORTE/{id}', [$reporteController, 'delete']);
$router->add('POST','/REPORTE', [$reporteController, 'create']);
$router->add('PUT','/REPORTE/{id}', [$reporteController, 'update']);