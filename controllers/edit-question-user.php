<?php
    require_once "models/Question.php";
    $question = new Question($database);

    if(isset($_GET['id'])) {
        $question_id = $_GET['id'];
        $question_from_db = $question->getQuestionById($question_id);
    }
    
    include "views/edit-question-form.php";
?>