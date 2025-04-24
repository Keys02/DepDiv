<?php
    require_once "models/Question.php";
    require_once "models/User.php";
    $question = new Question($database);
    $user = new User($database);
    $logged_in_user_id = $user_login_session->getLoggedInUser();
    
    if($_GET['search-query'] !== '') {
        $search_query = $_GET['search-query'];;
        $questions_from_db = $question->searchQuestion($search_query);
        include "views/search-template.php";
    } else {
        include_once "controllers/questions.php";
    }
?>