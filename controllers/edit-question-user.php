<?php
    if(isset($_GET['id'])) {
        $question_id = $_GET['id'];
    }
    include "views/edit-question-form.php";
?>