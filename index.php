<?php
session_start();
require_once "app/Config/autoload.php";
require "app/Config/database.php";

use App\Controllers\ProductController;
use App\Controllers\CommentController;
use App\Config\DB;

$db = DB::instance();
$commentController = new CommentController($db);
$productController = new ProductController($db);
$comments = $commentController->show();
$products = $productController->show();
$messages = [];

if(isset($_POST['submit'])) {
    $response = $commentController->addComment($_POST);
    $messages[] = $response->message;
    $comments[] = $response->newComment;
} else {
    echo "NONE";
}


require_once "app/Views/shared/header.php";
if(isset($_GET['page'])){
    switch($_GET['page']) {
        
    }
} else {
    require_once "app/views/pages/home.php";
}
require_once "app/Views/shared/footer.php";




