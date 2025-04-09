<?php
    require_once "models/Answer.php";
    $answer = new Answer($database);
    
    if($_GET['page'] === "view-qtn"  && isset($_GET['qtn'])) {
        $question_id = $_GET['qtn'];
        $answers_from_db = $answer->getQuestionAnswers($question_id);
    }

    include "views/answers-template.php";
    include "controllers/submit-answer.php";
?>