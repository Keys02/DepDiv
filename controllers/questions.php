<?php
    include_once "models/Question.php";
    $question = new Question($database);
    $questions_from_db = $question->getAllQuestions();
    include_once "views/all-questions-template.php";
?>