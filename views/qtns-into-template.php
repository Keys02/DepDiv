<?php
    function insert_qtns_into_template(object $db_questions, string $template) {

        while($question_record = $db_questions->fetchObject()) {
            $template .= "
                            <li>
                                <a href='index.php?qtn={$question_record->question_id}'>{$question_record->question_body}</a>
                            </li>
                        ";
        }
        return $template;
    }
?>