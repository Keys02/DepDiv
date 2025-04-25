<?php
    $template .= "<form method='post' action='index.php?route=/user/$logged_in_user_id/question/$question_id'>";

    $template .= "<input type='submit' class='alter-question-btn' name='alter-qtn-status'";

    if($question_from_db->question_status === 1) {
        $template .= "value='Close question'>";
    } else {
        $template .= "value='Reopen question'>";
    }
    
    $template .= "</form>";
?>