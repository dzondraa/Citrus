<?php
session_start();
require_once "app/Config/autoload.php";
require "app/Config/database.php";

use App\Config\DB;
$db = DB::instance();



require_once "app/Views/shared/header.php";
if(isset($_GET['page'])){
    switch($_GET['page']) {
        
    }
} else {
    
}
require_once "app/Views/shared/footer.php";





