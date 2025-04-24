<?php
    require_once "models/Question.php";
    require_once "models/User.php";

    $question = new Question($database);
    $user = new User($database);

    $logged_in_user_id = $user_login_session->getLoggedInUser();

    if(isset($_POST['qtn-id']) && isset($_POST['qtn-title']) && isset($_POST['qtn-body']) && isset($_POST['post-qtn'])) {
        $button_clicked = $_POST['post-qtn'];
        $question_id = $_POST['qtn-id'];
        $question_title = $_POST['qtn-title'];
        $question_body = $_POST['qtn-body'];

        if($button_clicked === "Post" && $question_id === '0') {            
            $question->postNewQuestion($question_title, $question_body, $logged_in_user_id);
            header("Location: index.php?route=/user/$logged_in_user_id");
        } else if($button_clicked === "Save" && $question_id !== '0') {
            $question->updateQuestion($question_id, $question_title, $question_body);
            header("Location: index.php?route=/user/{$logged_in_user_id}/my-questions");
        }
    }

    if($_GET['route'] == "/user/$logged_in_user_id/editor" && isset($_GET['question'])) {
        $question_id = $_GET['question'];
        $question_from_db = $question->getQuestionById($question_id);
    } else {
        $question_from_db = new StdClass;
        $question_from_db->question_id = 0;
        $question_from_db->question_title = "";
        $question_from_db->question_body = "";
    }

    include_once "views/editor.php";
?>