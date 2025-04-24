<?php
    function insert_qtns_into_template(object $db_questions, string $template, ?string $current_page = null) {
        global $logged_in_user_id;
        global $user;
        if($current_page === "my-questions") {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <article class='question'>
                                    <img src='assets/imgs/{$user->getUserAvatar($question_record->user_id)}'>
                                    <div class='question-text'>
                                        <h2 class='question-title'><a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_record->question_id}'>{$question_record->question_title}</a></h2>
                                        <div class='question-body'>{$question_record->question_body}</div>
                                        <a href='index.php?route=/user/{$logged_in_user_id}/editor&question={$question_record->question_id}' class='edit-btn'>Edit</a>
                                    </div>
                                </article>
                            ";
            }
            return $template;
        } else {
            while($question_record = $db_questions->fetchObject()) {
                $template .= "
                                <article class='question'>
                                    <img src='assets/imgs/{$user->getUserAvatar($question_record->user_id)}'>
                                    <div class='question-text'>
                                        <h2 class='question-title'><a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_record->question_id}'>{$question_record->question_title}</a></h2>
                                        <div class='question-body'>{$question_record->question_body}</div>
                                    </div>
                                </article>
                            ";
            }
            return $template;
        }
    }
?>