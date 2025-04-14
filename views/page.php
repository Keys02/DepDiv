<?php
/*
    View: To be rendered in the front controller
*/
    require_once "partials/_header.php";
     
    $main_content =  "
        <section id='container'>
            <header>
                <nav>{$page->getNavigation()}</nav>
            </header>
            <main>{$page->getContent()}</main>
        </section>
    ";
    require_once "partials/_footer.php";

    $page_view = $header . $main_content . $footer
?>