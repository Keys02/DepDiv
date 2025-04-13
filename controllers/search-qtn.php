<?php
    require_once "models/Question.php";
    $question = new Question($database);
    if($_GET['search-query'] !== '') {
        $search_query = $_GET['search-query'];;
        $questions_from_db = $question->searchQuestion($search_query);
        include "views/search-template.php";
    } else {
        include_once "controllers/questions.php";
    }
?>