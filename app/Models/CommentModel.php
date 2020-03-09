<?php 

namespace App\Models;

class CommentModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getComments($paginate = null) {
        $query = $paginate == null ? "select * from comments" : "select * from comments limit $paginate";
        // $query = "select * from products";
        try {
            $result = $this->db->executeQuery($query);
        } catch(PDOException $ex) {
            $ex->getMessage();
        }
        return $result;

        
    }
}