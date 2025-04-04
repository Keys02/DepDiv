<?php
    require_once "models/Page.php";

    $page = new Page("Deep dive forum");
    $page->setContent("<h1>Question</h1>");
    $page->appendContent("<p>Is null the same as \"\" in php</p>");

    include_once "views/page.php";
    echo $template;
?>