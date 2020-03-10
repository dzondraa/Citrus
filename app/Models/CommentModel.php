<?php 

namespace App\Models;
use App\Controllers\LoginController;

class CommentModel {
    private $db;
    private $loginController;
    
    public function __construct($db) {
        $this->db = $db;
        $this->loginController = new LoginController($db);
    }

    public function getComments($status) {
        $query = "select * from comments where approved='$status'";
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

    public function updateStatus($id, $status) {
        
        if($this->loginController->isAdmin()) {
            $query = "update comments set approved = ? where id = ?";
            try {
                $this->db->executeInsert($query, [$status, $id]);
            }
            catch(PDOException $ex) {
                echo $ex->getMessage();
            }
           
        }
    }
}