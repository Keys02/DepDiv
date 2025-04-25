<?php
    if(isset($questions_from_db) === false) {
        $question_from_db = "";
    }
    $template = "<h2>Questions</h2>";

    $template = insert_qtns_into_template($questions_from_db, $template);
?>