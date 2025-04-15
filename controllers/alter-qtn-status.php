<?php
    if(isset($_POST['alter-qtn-status'])) {
        $button_clicked = $_POST['alter-qtn-status'];

        if($button_clicked === "Close question") {
            $question->closeQuestion($question_id);
        } else if($button_clicked === "Reopen question") {
            $question->reopenQuestion($question_id);
        }
        header("Location: index.php?route=/user/$logged_in_user_id/question/$question_id");
    }

    include "views/alter-qtn-status-form.php";
?>