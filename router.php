<?php
    if(isset($_GET['page'])) {
        $current_page = $_GET['page'];
        include_once "controllers/$current_page-user.php";
    } else {
        include_once "views/user-login-form.php";
    }
    
    $page->appendContent($template);
?>