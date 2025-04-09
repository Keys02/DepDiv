<?php
    function insert_qtns_into_template(object $db_questions, string $template, ?string $current_page = null) {
        if($current_page === "my-qtns") {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <li>
                                    <a href='index.php?page=view-qtn&qtn={$question_record->question_id}'>{$question_record->question_body}</a>
                                    <a href='index.php?page=post-qtn&qtn={$question_record->question_id}'>Edit</a>
                                </li>
                            ";
            }
            return $template;
        } else {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <li>
                                    <a href='index.php?page=view-qtn&qtn={$question_record->question_id}'>{$question_record->question_body}</a>
                                </li>
                            ";
            }
            return $template;
        }
    }
?>