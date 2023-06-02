<?php

namespace Paw\Core\Database;

use PDO;
use Monolog\Logger;

class QueryBuilder {
    
    public function __construct(PDO $pdo, Logger $logger) {
        $this -> pdo = $pdo;
        $this -> logger = $logger;
    }

    public function select($table, $params = []) {
        // WHERE id = 1 AND nombre = 'pepe'
        // WHERE id = ?
        // WHERE id = :id
        $where = " 1 = 1";
        if (isset($params['id'])) {
            $where = " id = :id ";
        }
        $query = "select * from {$table} where {$where}";
        $sentencia = $this -> pdo -> prepare($query);
        if (isset($params['id'])) {
            $sentencia -> bindValue(":id", $params['id']);
        }
        $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
        $sentencia -> execute();
        return $sentencia -> fetchAll();
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $query = "insert INTO $table ($columns) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($query);
        
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        
        $statement->execute();
        return $this->pdo->lastInsertId();
    }
    
    
    public function update() {

    }

    public function delete() {
        
    }
}