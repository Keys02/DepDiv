<?php
    if(isset($_GET['page'])) {
        $current_page = $_GET['page'];
        include_once "controllers/$current_page-user.php";
    } 
    else {
        if($user_login_session->userIsLoggedIn()) {
            require_once "controllers/questions.php";
        }
    //     include_once "views/user-login-form.php";
    }
?>