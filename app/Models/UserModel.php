<?php 

namespace App\Models;

class UserModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getUser($username , $password) {
        $query = "select * from users where
        name = ? and password = ?";

        try {
            $res = $this->db->executeOneRow($query , [$username, md5($password)]);
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
        return $res;

        
    }
}