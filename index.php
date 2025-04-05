<?php
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();

    $page = new Page("DepDiv");
    $page->setContent("<h1>Questions</h1>");

    include_once "router.php";
    
    if($user_login_session->UserIsLoggedIn()) {
        $template = "<p>{$_SESSION['logged-in-user']} All messages will be displayed here</p>";
        require_once "controllers/logout-user.php";
    }

    $page->appendContent($template);
    include_once "views/page.php";
    echo $template;
?>