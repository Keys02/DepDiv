<?php
/*
    View: To be rendered in the front controller
*/
    require_once "partials/_header.php";
     
    $main_content =  "
            <header>
                <nav>{$page->getNavigation()}</nav>
            </header>
            <main>{$page->getContent()}</main>
    ";
    require_once "partials/_footer.php";

    $page_view = $header . $main_content . $footer
?>