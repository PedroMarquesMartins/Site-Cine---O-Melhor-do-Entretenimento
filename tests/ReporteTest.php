<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/models/Reporte.php';

class ReporteTest extends TestCase
{
    private $connection;
    private $reporte;

    protected function setUp(): void
    {
        echo("Teste rodando...");
        $this->connection = new PDO('mysql:host=127.0.0.1;dbname=api_db', 'root', 'password');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->exec("TRUNCATE TABLE REPORTE");

        $this->reporte = new Reporte($this->connection);
    }

    public function testCreate()
    {
        $result = $this->reporte->create('Bug na tela de login', 'Adicionar botão de lembrar senha', 1);
        $this->assertTrue($result, 'Erro ao inserir reporte.');

        $data = $this->reporte->getById(1);
        $this->assertNotEmpty($data, 'Reporte não encontrado após inserção.');
        $this->assertEquals('Bug na tela de login', $data['descricaoBug'], 'Descrição do bug não corresponde.');
        $this->assertEquals('Adicionar botão de lembrar senha', $data['descricaoSugestao'], 'Sugestão não corresponde.');
    }

    public function testList()
    {
        $this->reporte->create('Bug na tela de login', 'Adicionar botão de lembrar senha', 1);
        $this->reporte->create('Erro ao salvar', 'Criar validação para campos obrigatórios', 2);
        $reportes = $this->reporte->list();
        $this->assertCount(2, $reportes, 'Número de reportes listados não corresponde.');
    }

    public function testUpdate()
    {
        $this->reporte->create('Bug na tela de login', 'Adicionar botão de lembrar senha', 1);
        $this->reporte->update(1, 'Bug corrigido', 'Sugestão implementada', 2);
        $data = $this->reporte->getById(1);
        $this->assertEquals('Bug corrigido', $data['descricaoBug'], 'Descrição do bug não foi atualizada.');
        $this->assertEquals('Sugestão implementada', $data['descricaoSugestao'], 'Sugestão não foi atualizada.');
    }

    public function testDelete()
    {
        $this->reporte->create('Bug na tela de login', 'Adicionar botão de lembrar senha', 1);
        $this->reporte->delete(1);
        $data = $this->reporte->getById(1);
        $this->assertFalse($data, 'Reporte não foi deletado.');
    }
}