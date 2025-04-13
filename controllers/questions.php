<?php
    include_once "models/Question.php";
    include "views/qtns-into-template.php";
    $question = new Question($database);
    $questions_from_db = $question->getAllQuestions();
    $logged_in_user_id = $user_login_session->getLoggedInUser();
    include_once "views/all-qtns-template.php";
?>