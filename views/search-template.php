<?php
    if($questions_from_db->rowCount() === 0) {
        $template = "No results found for <em>$search_query</em>";
    } else {
        $template = "
                        <h2>Search results for <em>$search_query</em></h2>
                        <ul>
                    ";
        
        while($question_record = $questions_from_db->fetchObject()) {
            $template .= "
                            <li>
                                <a href='index.php?qtn={$question_record->question_id}'>{$question_record->question_body}</a>
                            </li>
                        ";
        }

        $template .= "
                            </ul>
                        </section>    
                    ";
    }
?>