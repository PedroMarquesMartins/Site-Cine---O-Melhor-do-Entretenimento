<?php
require_once __DIR__ . '/../config/db.php';

class Reporte
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create($descricaoBug, $descricaoSugestao, $usuarioID)
    {
        $sql = "INSERT INTO REPORTE (descricaoBug, descricaoSugestao, usuarioID) VALUES (:descricaoBug, :descricaoSugestao, :usuarioID)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':descricaoBug', $descricaoBug);
        $stmt->bindParam(':descricaoSugestao', $descricaoSugestao);
        $stmt->bindParam(':usuarioID', $usuarioID);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT * FROM REPORTE";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM REPORTE WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $descricaoBug, $descricaoSugestao, $usuarioID)
    {
        $sql = "UPDATE REPORTE SET descricaoBug = :descricaoBug, descricaoSugestao = :descricaoSugestao, usuarioID = :usuarioID WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':descricaoBug', $descricaoBug);
        $stmt->bindParam(':descricaoSugestao', $descricaoSugestao);
        $stmt->bindParam(':usuarioID', $usuarioID);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM REPORTE WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}