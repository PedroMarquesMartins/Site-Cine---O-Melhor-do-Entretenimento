<?php
require_once '../controllers/usuarioController.php';
require_once '../config/db.php';

class TesteCRUD
{
    private $controller;

    public function __construct()
    {
        // Criando uma instância do banco de dados
        $db = new Database(); // Aqui você cria uma instância do objeto Database (conexão com o banco)
        $this->controller = new usuarioController($db->getConnection());
    }

    public function testCreate()
    {
        // Dados para criar um novo usuário
        $dados = json_encode([
            'usuario' => 'testuser',
            'senha' => 'testpassword'
        ]);

        // Simulando um POST request
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['data'] = $dados;

        // Chamando a função de criação do controlador
        $this->controller->create();
    }

    public function testList()
    {
        // Simulando um GET request
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Chamando a função de listagem do controlador
        $this->controller->list();
    }

    public function testGetById()
    {
        // Testando a busca por ID, assumindo que o ID 1 exista no banco
        $id = 1;
        // Simulando um GET request
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Chamando a função para buscar o usuário por ID
        $this->controller->getById($id);
    }

    public function testUpdate()
    {
        // Dados para atualizar o usuário
        $dados = json_encode([
            'usuario' => 'updatedUser',
            'senha' => 'newpassword'
        ]);

        // Simulando um PUT request
        $_SERVER['REQUEST_METHOD'] = 'PUT';
        $_POST['data'] = $dados;

        // Supondo que o ID do usuário seja 1
        $id = 1;

        // Chamando a função de update do controlador
        $this->controller->update($id);
    }

    public function testDelete()
    {
        // Supondo que o ID do usuário a ser deletado seja 1
        $id = 1;

        // Simulando um DELETE request
        $_SERVER['REQUEST_METHOD'] = 'DELETE';

        // Chamando a função de delete do controlador
        $this->controller->delete($id);
    }
}
