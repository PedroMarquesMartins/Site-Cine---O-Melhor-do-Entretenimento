<?php
require_once '../controllers/usuarioController.php';

$usuarioController = new usuarioController($pdo);

$router->add('GET','/USUARIO', [$usuarioController, 'list']);
$router->add('GET','/USUARIO/{id}', [$usuarioController, 'getById']);
$router->add('REMOVE','/USUARIO/{id}', [$usuarioController, 'delete']);
$router->add('POST','/USUARIO', [$usuarioController, 'getById']);
$router->add('PUT','/USUARIO', [$usuarioController, 'getById']);
