<?php
    if(isset($_GET['route'])) {
        $current_page = $_GET['route'];
        $exploded_route = explode('/', $_GET['route']);
        $question_id = $exploded_route[4] ?? null;

        switch($current_page) {
            case "/signup-guest";
                include_once "controllers/signup-user.php";
                break;
            case "/login";
                include_once "controllers/login-user.php";
                break;
            case "/signup-admin";
                include_once "controllers/admin/signup-admin.php";
                break;
            case "/user/{$user_login_session->getLoggedInUser()}/editor";
                include_once "controllers/post-qtn-user.php";
                break;
            case "/user/{$user_login_session->getLoggedInUser()}/my-questions";
                include_once "controllers/my-qtns-user.php";
                break;
            case "/user/{$user_login_session->getLoggedInUser()}/question/$question_id";
                include_once "controllers/view-qtn-user.php";
                break;
            default;
                include_once "controllers/questions.php";
        }
    } else if(isset($_GET['search-query'])) {
        require "controllers/search-qtn.php";
    }
    else {
        $uri = $_SERVER['REQUEST_URI'];
        $exploded_uri = explode('/', $uri);
        $role_page = $exploded_uri = $exploded_uri[2];
        
        if($role_page === 'admin.php') {
            require_once "controllers/admin/signup-admin.php";
        } elseif($role_page === 'index.php') {
            require_once "controllers/login-user.php";
        }
    }
?>