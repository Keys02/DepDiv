<?php
    require_once "models/Question.php";
    require_once "models/User.php";

    $question = new Question($database);
    $user = new User($database);

    $logged_in_user_id = $user_login_session->getLoggedInUser();

    if(isset($_POST['user-id']) && isset($_POST['qtn']) && isset($_POST['post-qtn'])) {
        $user_id = $_POST['user-id'];
        $question_body = $_POST['qtn'];
        $question->postNewQuestion($question_body, $user_id);
        header('Location: index.php');
    }
    include_once "views/post-question-form.php";
?>