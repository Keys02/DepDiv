<?php
    if($questions_from_db->rowCount() === 0) {
        $template = "<h3>No results found for <em>$search_query</em></h3>";
    } else {
        include_once "views/qtns-into-template.php";

        $template = "<h2>Search results for <em>$search_query</em></h2>";
        
        $template = insert_qtns_into_template($questions_from_db, $template);
    }
?>