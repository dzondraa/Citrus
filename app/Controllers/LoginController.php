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
        $user = $this->model->getUser($data['username'] , $data['password']);
        if($user) {
            $_SESSION['user'] = $user;
        }
    }
  
}
?>
