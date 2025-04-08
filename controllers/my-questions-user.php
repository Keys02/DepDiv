<?php
    require_once "models/Question.php";
    include "views/qtns-into-template.php";
    
    $question = new Question($database);
    $current_page = $_GET['page'];
    $user_id = $user_login_session->getLoggedInUser();
    $user_questions_from_db = $question->getUserQuestions($user_id);
    include "views/user-questions.php";
?>