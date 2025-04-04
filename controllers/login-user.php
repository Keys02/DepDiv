<?php
    if(isset($_GET['page'])) {
        $current_page = $_GET['page'];

        if($current_page === "signup") {
            include_once "controllers/signup-user.php";
        } else if($current_page==="login") {
            include_once "views/user-login-form.php";
        }
    } else {
        include_once "views/user-login-form.php";
    }
?>