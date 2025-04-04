<?php
    if(isset($_GET['page'])) {
        $current_page = $_GET['page'];
        
        if($current_page === "login") {
            include_once "controllers/login-user.php";
        } else if($current_page === "signup"){
            include_once "views/user-signup-form.php";
        }
    }
?>