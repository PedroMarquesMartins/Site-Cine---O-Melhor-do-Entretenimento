<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../models/Reporte.php'; 

class ReporteTeste extends TestCase
{
    private $reporte;
    private $db;

    public function testCreate()
    {
        $descricaoBug = 'funcionalidade de login';
        $descricaoSugestao = 'Melhorar a segurança de autenticação';
        $usuarioID = 1;
        $result = $this->reporte->create($descricaoBug, $descricaoSugestao, $usuarioID);
        $this->assertTrue($result);

    }

    public function testList()
    {
        $this->reporte->create('Bug', 'suporte a novos idiomas', 1);
        $this->reporte->create('Erro', 'Melhorar a performance', 2);
        $reportes = $this->reporte->list();
        $this->assertCount(2, $reportes); 
    }

    public function testGetById()
    {
        $this->reporte->create('testa', 'segurança', 1);
        $this->reporte->create('imagens', 'carregamento de imagens', 2);
        $id = 1;
        $reporteObtido = $this->reporte->getById($id);
        $this->assertEquals('Bug ', $reporteObtido['descricaoBug']);
        $this->assertEquals('segurança', $reporteObtido['descricaoSugestao']);
        $this->assertEquals(1, $reporteObtido['usuarioID']);
    }

    public function testUpdate()
    {
        $this->reporte->create('Bug ', 'verificação de segurança', 1);
        $id =1;
        $this->reporte->update($id, 'corrigido', 'segurança do login', 1);
        $reporteAtualizado = $this->reporte->getById($id);
        $this->assertEquals('Bug ', $reporteAtualizado['descricaoBug']);
        $this->assertEquals('atualizar', $reporteAtualizado['descricaoSugestao']);
    }

    public function testDelete()
    {
        $this->reporte->create('aa', '1231', 1);
        $this->reporte->create('a', '32', 2);
        $reportesAntes = $this->reporte->list();
        $this->assertCount(2, $reportesAntes);
        $id =1;
        $this->reporte->delete($id);
        $reportesDepois = $this->reporte->list();
        $this->assertCount(1, $reportesDepois);
    }
}
