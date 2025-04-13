<?php
    require_once "models/Answer.php";
    $answer = new Answer($database);

    $current_user = $user_login_session->getLoggedInUser();
    
    $exploded_url = explode('/', $_GET['route']);
    $question_id = $exploded_url[4];
    $answers_from_db = $answer->getQuestionAnswers($question_id);

    include "views/answers-template.php";
    include "controllers/submit-answer.php";
?>