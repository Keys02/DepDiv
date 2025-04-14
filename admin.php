<?php
    require_once "models/Page.php";
    require_once "models/Database.php";

    $page = new Page("DepDiv");

    require "admin-router.php";
    $page->appendContent($template);
    include_once "views/page.php";
    echo $page_view;
?>