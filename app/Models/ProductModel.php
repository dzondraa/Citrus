<?php 

namespace App\Models;

class ProductModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getProducts($paginate = null) {
        $query = $paginate == null ? "select * from products" : "select * from products limit $paginate";
        // $query = "select * from products";
        try {
            $result = $this->db->executeQuery($query);
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
        return $result;

        
    }
}