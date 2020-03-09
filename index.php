<?php
session_start();
require_once "app/Config/autoload.php";
require "app/Config/database.php";

use App\Controllers\ProductController;
use App\Controllers\CommentController;
use App\Config\DB;

$db = DB::instance();
$productController = new ProductController($db);
$commentController = new CommentController($db);
$comments = $commentController->show();
$products = $productController->show();




require_once "app/Views/shared/header.php";
if(isset($_GET['page'])){
    switch($_GET['page']) {
        
    }
} else {
    require_once "app/views/pages/home.php";
}
require_once "app/Views/shared/footer.php";



