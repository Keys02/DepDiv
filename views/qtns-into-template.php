<?php
    function insert_qtns_into_template(object $db_questions, string $template, ?string $current_page = null) {
        global $logged_in_user_id;
        
        if($current_page === "my-questions") {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <li>
                                    <a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_record->question_id}'>{$question_record->question_body}</a>
                                    <a href='index.php?route=/user/{$logged_in_user_id}/editor&question={$question_record->question_id}'>Edit</a>
                                </li>
                            ";
            }
            return $template;
        } else {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <li>
                                    <a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_record->question_id}'>{$question_record->question_body}</a>
                                </li>
                            ";
            }
            return $template;
        }
    }
?>