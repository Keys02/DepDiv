<?php
    require_once "models/Answer.php";
    require_once "models/Question.php";

    $answer = new Answer($database);
    $question = new Question($database);
    $answer_from_db = $answer->getAnswer($answer_id);
    $question_from_db = $question->getQuestionById($question_id);

    if(isset($_POST['ans']) && isset($_POST['save'])) {
        $answer_body = $_POST['ans'];
        $answer->updateAnswer($answer_id, $answer_body);
        header("Location: index.php?route=/user/$logged_in_user_id/question/$question_id");
    }

    include "views/edit-answer-form.php";
?>