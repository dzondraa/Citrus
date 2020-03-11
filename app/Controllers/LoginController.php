<?php

namespace App\Controllers;
use app\Models\UserModel;

class LoginController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->model = new UserModel($db);
        $this->db = $db;
    }

    public function checkLogin($data) {
        $messages = [];
        $user = $this->model->getUser($data['username'] , $data['password']);
        if($user) {
            $_SESSION['user'] = $user;
            header("Location:index.php?page=admin");
        } else {
            return $messages[] =  (object)array(
                "message" => "Wrong login params." ,
                 "type" => "danger"
                );
        }
    }

    public function logout() {
        $_SESSION['user'] = null;
       header("Location:index.php");
    }

    public function isAdmin() {
        if(isset($_SESSION['user'])) {
            return $_SESSION['user']->role == 'admin' ? true : false;  
        }
        
    }
  
}
?>
