<?php
    require_once "models/Question.php";
    $question = new Question($database);

    if(isset($_GET['q'])) {
        $search_query = $_GET['q'];
        $questions_from_db = $question->searchQuestion($search_query);
    }
    include "views/search-template.php";
?>