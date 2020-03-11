<?php

namespace App\Controllers;
use app\Models\CommentModel;

class CommentController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->model = new CommentModel($db);
        $this->db = $db;
    }

    public function show($status) {
        $products = $this->model->getComments($status);
        return $products;
    }

    public function addComment($data) {
        $messages = [];
        $name = $data['name'];
        $email = $data['email'];
        $text = $data['text'];
        $approved = 'pending';

        if(!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $messages[] = (object)array("message" => "Only letters and white space allowed" , "type" => "danger");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $messages[] = (object)array("message" => "Invalid email format" , "type" => "danger");
        }

        if(strlen($text) < 1) {
            $messages[] = (object)array("message" => "Comment text should have at least 1 character" , "type" => "danger");
        }
        
        if(count($messages) == 0) {
            $success = $this->model->insert($name, $email, $text, $approved);
        }

        if($success) {
            $messages[] =  (object)array("message" => "Commented successfuly!" , "type" => "success");
            $newComment = (object)array(
                "id" => $this->db->getLastId(),
                "name" => $name,
                "email" => $email,
                "text" => $text,
                "approved" => $approved
            );
               
        } else {
            $messages[] = (object)array("message" => "Server error!" , "type" => "danger");
        }

        return $messages;
    }

    public function approve($id) {
        $this->model->updateStatus($id, 'approved');
    }

    public function delete($id) {
        $this->model->updateStatus($id, 'deleted');
    }
}
?>
