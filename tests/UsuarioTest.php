<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/models/Usuario.php';

class UsuarioTest extends TestCase
{
    private $connection;
    private $usuario;

    protected function setUp(): void
    {
        echo("Teste rodando...");
        $this->connection = new PDO('mysql:host=127.0.0.1;dbname=api_db', 'root', 'password');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       $this->connection->exec("TRUNCATE TABLE USUARIO");

        $this->usuario = new Usuario($this->connection);
    }

    public function testCreate()
    {
        $result = $this->usuario->create('João', 'senha123');
        $this->assertTrue($result, 'Erro ao inserir usuário.');
        $data = $this->usuario->getByUserSenha('João', 'senha123');
        $this->assertNotEmpty($data, 'Usuário não encontrado após inserção.');
        $this->assertEquals('João', $data['user'], 'Nome do usuário não corresponde.');
    }

    public function testList()
    {
        $this->usuario->create('João', 'senha123');
        $this->usuario->create('Maria', 'senha456');
        $usuarios = $this->usuario->list();
        $this->assertCount(2, $usuarios, 'Número de usuários listados não corresponde.');
    }

    public function testUpdate()
    {
        $this->usuario->create('João', 'senha123');
        $this->usuario->update(1, 'João Atualizado', 'novaSenha123');
        $data = $this->usuario->getById(1);
        $this->assertEquals('João Atualizado', $data['user'], 'Nome do usuário não foi atualizado.');
    }

    public function testGetByUserSenha()
    {
        $this->usuario->create('João', 'senha123');
        $data = $this->usuario->getByUserSenha('João', 'senha123');
        $this->assertNotEmpty($data, 'Usuário não encontrado .');
        $this->assertEquals('João', $data['user'], 'Usuário não corresponde.');
        $this->assertEquals('senha123', $data['senha'], 'Senha não corresponde.');
    }

    public function testDelete()
    {
        $this->usuario->create('João', 'senha123');
        $this->usuario->delete(1);
        $data = $this->usuario->getById(1);
        $this->assertFalse($data, 'Usuário não foi deletado.');
    }
}