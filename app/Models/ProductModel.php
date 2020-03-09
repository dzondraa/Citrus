<?php 

namespace App\Models;

class ProductModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "select * from products";
        try {
            $result = $this->db->executeQuery($query);
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;

        
    }
}