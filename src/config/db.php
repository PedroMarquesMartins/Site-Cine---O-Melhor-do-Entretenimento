<?php
$host ='127.0.0.1';
$db = 'api_db';
$user = 'root';
$pass = 'password';

//phpinfo();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
    die();
}
?>