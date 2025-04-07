<?php
    require_once "models/Question.php";
    $question = new Question($database);

    if(isset($_POST['qtn']) && isset($_POST['post-qtn'])) {
        $question_body = $_POST['qtn'];
        $question->postNewQuestion($question_body);
    }
    include_once "views/post-question-form.php";
?>