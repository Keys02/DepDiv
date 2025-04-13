<?php
    require_once "models/Question.php";
    require_once "models/User.php";

    $question = new Question($database);
    $user = new User($database);

    $logged_in_user_id = $user_login_session->getLoggedInUser();

    if(isset($_POST['question-id']) && isset($_POST['qtn']) && isset($_POST['post-qtn'])) {
        $button_clicked = $_POST['post-qtn'];
        $question_id = $_POST['question-id'];
        $question_body = $_POST['qtn'];

        if($button_clicked === "Post Question" && $question_id === '0') {            
            $question->postNewQuestion($question_body, $logged_in_user_id);
            header("Location: index.php?route=/user/$logged_in_user_id");
        } else if($button_clicked === "Save" && $question_id !== '0') {
            $question->updateQuestion($question_id, $question_body);
            header("Location: index.php?route=/user/{$logged_in_user_id}/my-questions");
        }
    }

    $exploded_url = explode('/', $current_page);
    $current_page = $exploded_url[3];

    if($_GET['route'] == "/user/1/editor" && isset($_GET['question'])) {
        $question_id = $_GET['question'];
        $question_from_db = $question->getQuestionById($question_id);
    } else {
        $question_from_db = new StdClass;
        $question_from_db->question_id = 0;
        $question_from_db->question_body = "";
    }

    include_once "views/post-qtn-form.php";
?>