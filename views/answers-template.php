<?php
    if(isset($answers_from_db) === false) {
        $template = "This question is yet to be answered";
    }else {
        include_once "views/qtns-into-template.php";

        $template = "<ul>";

        while($answer_row = $answers_from_db->fetchObject()) {
            $template .= "
                <li>$answer_row->answer_body</li>
            ";
        }
        
        $template .= "</ul>";
    }
?>