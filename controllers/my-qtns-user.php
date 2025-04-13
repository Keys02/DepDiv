<?php
    require_once "models/Question.php";
    include "views/qtns-into-template.php";
    
    $question = new Question($database);
    $exploded_url = explode('/', $current_page);
    $current_page = $exploded_url[3];
    $user_id = $user_login_session->getLoggedInUser();
    $user_questions_from_db = $question->getUserQuestions($user_id);
    include "views/user-qtns-template.php";
?>