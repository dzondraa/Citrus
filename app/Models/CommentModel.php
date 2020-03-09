<?php 

namespace App\Models;

class CommentModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getComments($paginate = null) {
        $query = $paginate == null ? "select * from comments" : "select * from comments limit $paginate";
        
        try {
            $result = $this->db->executeQuery($query);
        } catch(PDOException $ex) {
            $ex->getMessage();
        }
        return $result;
        
    }

    public function insert($name, $email, $text, $approved) {
        $query = "insert into comments values(null, ?, ?, ?, ?)";
        try {
            $res = $this->db->executeInsert($query , [$name , $email, $text, $approved]);
        } catch(PDOException $ex) {
            $ex->getMessage();
        }
        return $res;
    }
}