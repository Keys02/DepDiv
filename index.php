<?php
    require_once "models/Page.php";
    require_once "models/Database.php";
    session_start();

    $page = new Page("DepDiv");
    $page->setContent("<h1>Questions</h1>");

    include_once "router.php";
    
    if($_SESSION['logged-in']) {
        $template = "<p>{$_SESSION['logged-in-user']} All messages will be displayed here</p>";
        require_once "controllers/logout-user.php";
    }

    $page->appendContent($template);
    include_once "views/page.php";
    echo $template;
?>