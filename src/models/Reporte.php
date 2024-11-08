<?php
require_once './src/config/db.php';

class Reporte
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function create($descricaoBug, $descricaoSugestao, $idUsuario)
    {
        $sql = "INSERT INTO REPORTES (descricaoBug, descricaoSugestao, idUsuario) VALUES (:descricaoBug, :descricaoSugestao, :idUsuario)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':descricaoBug', $descricaoBug);
        $stmt->bindParam(':descricaoSugestao', $descricaoSugestao);
        $stmt->bindParam(':idUsuario', $idUsuario);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT * FROM REPORTES";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM REPORTES WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $descricaoBug, $descricaoSugestao, $idUsuario)
    {
        $sql = "UPDATE REPORTES SET descricaoBug = :descricaoBug, descricaoSugestao = :descricaoSugestao, idUsuario = :idUsuario WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':descricaoBug', $descricaoBug);
        $stmt->bindParam(':descricaoSugestao', $descricaoSugestao);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM REPORTES WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}