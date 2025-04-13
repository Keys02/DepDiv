<?php
    if(isset($_GET['route'])) {
        $current_page = $_GET['route'];
        $exploded_url = explode('/', $_GET['route']);
        $question_id = $exploded_url[4] ?? null;

        switch($current_page) {
            case "/signup";
                include_once "controllers/signup-user.php";
                break;
            case "/login";
                include_once "controllers/login-user.php";
                break;
            case "/user/{$user_login_session->getLoggedInUser()}/post-question";
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
            require_once "controllers/login-user.php";
    }
?>