<?php
session_start();
require_once("../Config/autoload.php");
require_once("../Controllers/CommentController.php");

$db = DB::instance();
$asd = new CommentController($db);