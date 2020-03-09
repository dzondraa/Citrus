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

    public function show() {
        $products = $this->model->getComments();
        return $products;
    }
}