<?php
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();
    $page = new Page("DepDiv");

    include_once "router.php";
    
    $page->appendContent($template);
    include_once "views/page.php";
    echo $page_view;
    $database = null;
?>