<?php
    require_once "models/Answer.php";
    require_once "models/Question.php";
    require_once "models/User.php";
    $answer = new Answer($database);
    $question = new Question($database);
    $user = new User($database);

    $logged_in_user_id = $user_login_session->getLoggedInUser();
    
    $exploded_url = explode('/', $_GET['route']);
    $question_id = $exploded_url[4];
    $answers_from_db = $answer->getQuestionAnswers($question_id);
    $question_from_db = $question->getQuestionById($question_id);
    $admin_from_db = $user->getUserRole($logged_in_user_id);

    include "views/answers-template.php";

    include "controllers/submit-answer.php";

    if($admin_from_db->role_id === 2) {
        include "controllers/alter-qtn-status.php";
    }
?>