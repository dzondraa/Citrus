<?php
    $user;
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if($user->role !== 'admin') {
            include "app/Views/pages/admin-views.php";
        }
    } else {
        include "app/Views/shared/login-form.php";
    }
?>