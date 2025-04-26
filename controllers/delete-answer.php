<?php
    require_once "models/Answer.php";
    $answer = new Answer($database);
    $answer->deleteAnswer($answer_id);
    header("Location: index.php?route=/user/$logged_in_user_id/question/$question_id");
?>