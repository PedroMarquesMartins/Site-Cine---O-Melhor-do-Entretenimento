<?php
require_once __DIR__ . '/../config/db.php';


class Usuario
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
   
       // $this -> create("UUser","Senhaa"); deu certo!
    }

    public function create($user, $senha)
    {
        $sql = "INSERT INTO USUARIO (user, senha) VALUES (:user, :senha)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':senha', $senha);
        return $stmt->execute();
    }

    public function list()
    {
        $sql = "SELECT id, user FROM USUARIO";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM USUARIO WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByUserSenha($user,$senha)
    {
        $sql = "SELECT * FROM USUARIO WHERE user = :user AND senha = :senha";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $user, $senha)
    {
        $sql = "UPDATE USUARIO SET user = :user, senha = :senha WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM USUARIO WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}