<?php
    include_once "models/Question.php";
    include "models/User.php";
    $question = new Question($database);
    $user = new User($database);
    $questions_from_db = $question->getAllQuestions();
    $logged_in_user_id = $user_login_session->getLoggedInUser();
    include "views/qtns-into-template.php";
    include "views/all-qtns-template.php";
?>