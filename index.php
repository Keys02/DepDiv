<?php
    require_once "models/Page.php";

    $page = new Page("Deep dive forum");
    $page->setContent("<h1>Question</h1>");
    include_once "controllers/login-user.php";
    $page->appendContent($template);
    include_once "views/page.php";
    echo $template;
?>