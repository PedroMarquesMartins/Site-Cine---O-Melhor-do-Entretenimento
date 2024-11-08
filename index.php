<?php
require_once './src/config/db.php';
require_once './src/Router.php';

header("Content-type: application/json; charset=UTF-8");

$router = new Router();

require_once './src/public/indexUsuario.php';
require_once './src/public/indexReporte.php';

$requestedPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathItems = explode("/", $requestedPath);
$requestedPath = "/" . $pathItems[3] . ($pathItems[4] ? "/" . $pathItems[4] : "");

$router->dispatch($requestedPath);