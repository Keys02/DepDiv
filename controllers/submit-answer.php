<?php
    require_once "models/Answer.php";
    $answer = new Answer($database);

    if(isset($_GET['qtn'])) {
        $question_id = $_GET['qtn'];
    }

    if(isset($_POST['ans']) && isset($_POST['submit-answer'])) {
        $answer_body = $_POST['ans'];
        $user_id = $user_login_session->getLoggedInUser();
        $answer->submitAnswer($answer_body, $question_id, $user_id);
        header("Location: index.php?page=view-qtn&qtn=$question_id");
    }
    include "views/submit-answer-form.php";
?>