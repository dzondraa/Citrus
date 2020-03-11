<?php
session_start();
require_once "app/Config/autoload.php";
require "app/Config/database.php";

use App\Controllers\ProductController;
use App\Controllers\CommentController;
use App\Controllers\LoginController;

use App\Config\DB;

$db = DB::instance();
$commentController = new CommentController($db);
$productController = new ProductController($db);
$loginController = new LoginController($db);

$comments = $commentController->show('approved');
$products = $productController->show();
$messages = [];

if(isset($_POST['submit'])) {
    $response = $commentController->addComment($_POST);
    foreach($response as $msg) {
        $messages[] = $msg;
    }
    // $comments[] = $response->newComment;
} 
if (isset($_POST['login-submit'])) {
    $error = $loginController->checkLogin($_POST);
    if(!is_null($error)) {
        $messages[] = $error;
    }
}


require_once "app/Views/shared/header.php";

if(isset($_GET['page'])){
    switch($_GET['page']) {
        case $_GET['page'] == 'admin' : 
            
            if(isset($_GET['action']) && isset($_GET['id'])) {

                switch($_GET['action']) {

                    case 'delete' : $commentController->delete($_GET['id']);
                    break;
                    case 'approve' : $commentController->approve($_GET['id']);
                    break;
                }
               
            }
            $comments = $commentController->show('pending');
            require_once "app/views/pages/admin.php";
            break;

        case $_GET['page'] == 'logout' : $loginController->logout();
        break;
    }
} else {
    require_once "app/views/pages/home.php";
}
require_once "app/Views/shared/footer.php";




