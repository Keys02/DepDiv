<?php
    require_once "models/Question.php";
    $question = new Question($database);
    $user_id = $user_login_session->getLoggedInUser();
    $user_questions_from_db = $question->getUserQuestions($user_id);
    include "views/user-questions.php";
?>