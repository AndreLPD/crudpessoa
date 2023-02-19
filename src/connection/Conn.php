<?php

class Conn {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "dbpessoas";
    private $conn;
    
    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function query($query) {
        return $this->conn->query($query);
    }
    
    public function prepare($query) {
        return $this->conn->prepare($query);
    }
    
    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }
}

?>

