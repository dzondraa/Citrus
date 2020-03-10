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
        $name = $data['name'];
        $email = $data['email'];
        $text = $data['text'];
        $approved = 'pending';

        // TO DO - VALIDATIONS

        $success = $this->model->insert($name, $email, $text, $approved);
        $msg;
        if($success) {
            $msg =  (object)array("message" => "Commented successfuly!" , "type" => "success");
            $newComment = (object)array(
                "id" => $this->db->getLastId(),
                "name" => $name,
                "email" => $email,
                "text" => $text,
                "approved" => $approved
            );
               
        } else {
            $msg = (object)array("message" => "Server error!" , "type" => "danger");
        }

        return (object)array("message" => $msg, "newComment" => $newComment);
    }

    public function approve($id) {
        $this->model->updateStatus($id, 'approved');
    }

    public function delete($id) {
        $this->model->updateStatus($id, 'deleted');
    }
}
?>
