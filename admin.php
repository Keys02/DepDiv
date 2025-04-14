<?php
    require_once "models/Page.php";

    $page = new Page("DepDiv");

    include_once "views/page.php";
    echo $page_view;
?>