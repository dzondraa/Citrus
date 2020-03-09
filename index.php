<?php
session_start();
require_once "app/Config/autoload.php";
require "app/Config/database.php";

use App\Controllers\ProductController;
use App\Config\DB;

$db = DB::instance();
$productController = new ProductController($db);
$products = $productController->show();



require_once "app/Views/shared/header.php";
if(isset($_GET['page'])){
    switch($_GET['page']) {
        
    }
} else {
    
}
require_once "app/Views/shared/footer.php";


var_dump($products);


