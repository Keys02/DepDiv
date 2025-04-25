<?php
    if(isset($answers_from_db) === false) {
        $template = "This question is yet to be answered";
    }else {
        $template = "
            <h2>{$question_from_db->question_title}</h2>
            ";

        if($question_from_db->question_status === 2) {
            $template .= "<span class='question-status-msg-close'>Closed</span>";
        } else {
            $template .= "<span class='question-status-msg-open'>Open</span>";
        }

        while($answer_row = $answers_from_db->fetchObject()) {
            $template .= "
                <article class='answer'>
                    <img src='assets/imgs/{$user->getUserAvatar($answer_row->user_id)}'>
                    <div class='answer-text'>
                        <h2 class='username'>{$user->getUsername($answer_row->user_id)}</h2>
                        <div class='answer-body'>$answer_row->answer_body</div>
                    </div>
                </article>
            ";
        }
    }
?>