<?php
    $template = ''; // template default value;
    require_once "models/Page.php";
    require_once "models/Database.php";
    require_once "models/UserSession.php";

    $user_login_session = new UserSession();

    $page = new Page("DepDiv");
    
    $page->setStylesheet("<link rel='stylesheet' href='assets/css/style.css'>");
    require_once "router.php";

    if($user_login_session->userIsLoggedIn()) {
        require "controllers/upload-avatar.php";
        require "controllers/logout-user.php";
        
        $logged_in_user_id = $user_login_session->getLoggedInUser();

        $page->setNavigation(
            "
                <ul class='navigation' role='toolbar'>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}' role='button'>Questions</a></li>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}/editor' role='button'>Create</a></li>
                    <li><a href='index.php?route=/user/{$logged_in_user_id}/my-questions' role='button'>My questions</a></li>
                    <li>
                        <form class='search-form' method='get' action='index.php'>
                            <input type='search' name='search-query'/>
                            <input type='submit' class='search-btn' value='Search'/>
                        </form>
                    </li>
                    <li class='user-avatar-section'>
                        <div class='avatar'>
                            <img class='avatar-img'src='assets/imgs/$user_avatar' style='object-fit: cover; width: 100%; height: 100%; border-radius: 100%;' />
                        </div>
                        <div class='user-profile-control'>
                            $avatar_upload_form
                            $logout_form
                        </div>
                    </li>
                </ul>
            "
        );
    }

    $page->appendContent($template);
    include_once "views/page.php";
    echo $page_view;

    $database = null;
?>