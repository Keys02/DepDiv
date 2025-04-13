<?php
    require_once "models/Answer.php";
    $answer = new Answer($database);

    $user_id = $user_login_session->getLoggedInUser();

    if(isset($_POST['ans']) && isset($_POST['submit-answer'])) {
        $answer_body = $_POST['ans'];
        $answer->submitAnswer($answer_body, $question_id, $user_id);
        header("Location: index.php?route=/user/$user_id/question/$question_id");
    }
    include "views/submit-answer-form.php";
?>