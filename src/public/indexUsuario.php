<?php
require_once __DIR__ . '/../controllers/usuarioController.php';

$usuarioController = new usuarioController($pdo);

$router->add('GET','/USUARIO', [$usuarioController, 'list']);
$router->add('GET','/USUARIO/{id}', [$usuarioController, 'getById']);
$router->add('POST','/USUARIO/Login',[$usuarioController, 'getByUserSenha']);//DANGER
$router->add('DELETE','/USUARIO/{id}', [$usuarioController, 'delete']);
$router->add('POST','/USUARIO', [$usuarioController, 'create']);
$router->add('PUT','/USUARIO', [$usuarioController, 'getById']);