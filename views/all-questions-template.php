<?php
    if(isset($questions_from_db) === false) {
        $question_from_db = "";
    }
    $template = "
                    <section>
                        <ul>
                ";
    
    while($question_record = $questions_from_db->fetchObject()) {
        $template .= "
                        <li>
                            <a href='index.php?question={$question_record->question_id}'>{$question_record->question_body}</a>
                        </li>
                    ";
    }

    $template .= "
                        </ul>
                    </section>    
                "
?>