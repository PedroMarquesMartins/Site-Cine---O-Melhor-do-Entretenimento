<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../models/Usuario.php'; 

class UsuarioTeste extends TestCase
{
    private $usuario;
    private $db;

    public function testCreate()
    {
        $user = 'testeUser';
        $senha = 'testeSenha123';
        $result = $this->usuario->create($user, $senha);
        $this->assertTrue($result);
    }

    
    public function testList()
    {
        $this->usuario->create('user1', 'senha1');
        $this->usuario->create('user2', 'senha2');
        $usuarios = $this->usuario->list();
        $this->assertCount(2, $usuarios);
    }

    public function testGetByUserSenha()
    {
        $this->usuario->create('user1', 'senha1');

        $usuarioObtido = $this->usuario->getByUserSenha('user1', 'senha1');
        $this->assertEquals('user1', $usuarioObtido['user']);
        $this->assertEquals('senha1', $usuarioObtido['senha']);
    }

    public function testDelete()
    {
        $this->usuario->create('user1', 'senha1');
        $this->usuario->create('user2', 'senha2');
        $usuariosAntes = $this->usuario->list();
        $this->assertCount(2, $usuariosAntes);

        $stmt = $this->db->query("SELECT id FROM USUARIO WHERE user = 'user1'");
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $usuario['id'];
        $this->usuario->delete($id);
        $usuariosDepois = $this->usuario->list();
        $this->assertCount(1, $usuariosDepois);
    }
}
