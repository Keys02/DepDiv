<?php
    $template = ''; // template default value;
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();

    $page = new Page("DepDiv");

    include_once "router.php";
    
    if($user_login_session->userIsLoggedIn()) {
        $logged_in_user_id = $user_login_session->getLoggedInUser();

        $page->setNavigation(
            "
                <ul>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}'>Questions</a></li>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}/editor'>Post a question</a></li>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}/my-questions'>My questions</a></li>
                    <li>
                        <form method='get' action='index.php'>
                            <input type='search' name='search-query'/>
                            <input type='submit' value='search'/>
                        </form>
                    </li>
                </ul>
            "
        );
        require "controllers/logout-user.php";
    }

    $page->appendContent($template);
    include_once "views/page.php";
    echo $page_view;

    $database = null;
?>