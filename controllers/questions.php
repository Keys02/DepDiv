<?php
    include_once "models/Question.php";
    $question = new Question($database);
    $questions_from_db = $question->getAllQuestions();

    // while($question_record = $questions_from_db->fetchObject()) {
    //     echo "<p>" , $question_record->question_body , "<p>";
    // }
    include_once "views/all-questions-template.php";
?>