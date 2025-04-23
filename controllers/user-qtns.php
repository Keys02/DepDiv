<?php
    require_once "models/Question.php";
    require_once "models/User.php";
    $question = new Question($database);
    $exploded_url = explode('/', $current_page);
    $user = new User($database);
    $master = "I am the master";
    $current_page = $exploded_url[3];
    $logged_in_user_id = $user_login_session->getLoggedInUser();
    $user_questions_from_db = $question->getUserQuestions($logged_in_user_id);
    include "views/qtns-into-template.php";
    include "views/user-qtns-template.php";
?>