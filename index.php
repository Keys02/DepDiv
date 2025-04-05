<?php
    require_once "models/Page.php";
    require_once "models/Database.php";

    $page = new Page("DepDiv");
    $page->setContent("<h1>Question</h1>");
    include_once "router.php";
    include_once "views/page.php";
    echo $template;
?>