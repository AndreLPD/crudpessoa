<?php
require_once("./src/connection/Conn.php");
class PessoaModel {
    private $db;
    
    public function __construct() {
        $this->db = new Conn();
    }

    public function list($id = null)
    {
        $query = "SELECT p.id_pessoa, p.nome_pessoa, p.data_nasc 
                  FROM pessoas p
                  WHERE 1=1";


        if (isset($id) && !empty($id)) {
            $query .= " AND id_pessoa = :id";
        }
        
        $stmt = $this->db->prepare($query);
        
        if (isset($id) && !empty($id)) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        if (!isset($id)) {
            return $stmt->fetchAll();
        } else {
            return $stmt->fetch();
        }
        
    }

     public function insert($nome_pessoa, $data_nasc)
    {
        $query = "INSERT INTO pessoas (nome_pessoa, data_nasc)
        VALUES (:nome_pessoa, :data_nasc)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nome_pessoa', $nome_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(':data_nasc', $data_nasc, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function update($id, $nome_pessoa, $data_nasc)
    {
        $query = "UPDATE pessoas p
                  SET p.nome_pessoa = :nome_pessoa, p.data_nasc = :data_nasc
                  WHERE p.id_pessoa = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome_pessoa', $nome_pessoa, PDO::PARAM_STR);
        $stmt->bindParam(':data_nasc', $data_nasc, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $query = "DELETE FROM pessoas WHERE pessoas.id_pessoa = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch();
    }
}