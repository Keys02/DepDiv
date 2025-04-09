<?php
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();

    $page = new Page("DepDiv");

    include_once "router.php";
    
    if($user_login_session->userIsLoggedIn()) {
        $page->setNavigation(
            "
                <ul>
                    <li><a href='index.php'>Questions</a></li>
                    <li><a href='index.php?page=post-question'>Post a question</a></li>
                    <li><a href='index.php?page=my-questions'>My questions</a></li>
                    <li>
                        <form method='get' action='index.php'>
                            <input type='search' name='q' />
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
    echo $template;
    $database = null;
?>