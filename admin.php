<?php
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();
    $page = new Page("DepDiv");
    $page->setStylesheet("<link rel='stylesheet' href='assets/css/style.css'>");
    require_once "router.php";

    include_once "router.php";
    
    $page->appendContent($template);
    include_once "views/page.php";
    echo $page_view;
    $database = null;
?>