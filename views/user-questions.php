<?php
    if($user_questions_from_db->rowCount() === 0) {
        $template = "
                        <h1>No question found</h1>
                        <a href='index.php?page=post-question' role='button'>Post a question</a>
                    ";
    } else {
        $template = "
                        <h2>My questions</h2>
                        <ul>
                    ";

        $template = insert_qtns_into_template($user_questions_from_db, $template, $current_page);
    
        $template .= "
                        </ul>
                    ";
    }
?>