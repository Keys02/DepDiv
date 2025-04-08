<?php

    if($user_questions_from_db->rowCount() === 0) {

        $template = "
                        <h1>No questions found</h1>
                        <a href='index.php?page=post-question'>Post a question</a>
                    ";
    } else {

        $template = "
                            <h2>My questions</h2>
                            <ul>
                    ";
        
        while($question_record = $user_questions_from_db->fetchObject()) {
            $template .= "
                            <li>
                                <a href='index.php?qtn={$question_record->question_id}'>{$question_record->question_body}</a>
                            </li>
                        ";
        }
    
        $template .= "
                            </ul>
                    ";
    }
?>