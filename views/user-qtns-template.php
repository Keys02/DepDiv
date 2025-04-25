<?php
    if($user_questions_from_db->rowCount() === 0) {
        $template = "
                        <h1>No question found</h1>
                        <a href='index.php?route=/user/$logged_in_user_id/editor' role='button'>Post a question</a>
                    ";
    } else {
        $template = "<h2>My questions</h2>";

        $template = insert_qtns_into_template($user_questions_from_db, $template, $current_page);
    }
?>