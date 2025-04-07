<?php
    if(isset($_GET['question'])) {
        $question_id = $_GET['question'];
    }
    include "views/answer-question-form.php";
?>