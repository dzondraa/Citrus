<?php

namespace App\Controllers;
use app\Models\ProductModel;

class ProductController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->model = new ProductModel($db);
        $this->db = $db;
    }

    public function show() {
        $products = $this->model->getAll();
        return $products;
    }
}