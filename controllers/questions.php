<?php
    include_once "models/Question.php";
    include "views/qtns-into-template.php";
    $question = new Question($database);
    $questions_from_db = $question->getAllQuestions();
    include_once "views/all-qtns-template.php";
?>