<?php
require_once 'TesteCRUD.php';

// Criando uma instância do TesteCRUD
$teste = new TesteCRUD();

// Executando os testes
echo "Iniciando o teste de criação...\n";
$teste->testCreate();
echo "\n";

echo "Iniciando o teste de listagem...\n";
$teste->testList();
echo "\n";

echo "Iniciando o teste de busca por ID...\n";
$teste->testGetById();
echo "\n";

echo "Iniciando o teste de atualização...\n";
$teste->testUpdate();
echo "\n";

echo "Iniciando o teste de exclusão...\n";
$teste->testDelete();
echo "\n";
?>
