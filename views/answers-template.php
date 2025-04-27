<?php
    function show_question_status(object $question, string $template) {
        $template = "";
        if($question->question_status === 2) {
            $template = "<span class='question-status-msg-close'>Closed</span>";
        } else {
            $template = "<span class='question-status-msg-open'>Open</span>";
        }
        return $template;
    }

    if($answers_from_db->rowCount() === 0) {
        $template = "<h2>This question is yet to be answered</h2>";
        
        $template .= show_question_status($question_from_db, $template);
    }else {
        $template = "
            <h2>{$question_from_db->question_title}</h2>
            ";

        $template .= show_question_status($question_from_db, $template);

        while($answer_row = $answers_from_db->fetchObject()) {
            $template .= "
                <article class='answer'>
                    <img src='assets/imgs/{$user->getUserAvatar($answer_row->user_id)}'>
                    <div class='answer-text'>
                        <h2 class='username'>{$user->getUsername($answer_row->user_id)}</h2>
                        <div class='answer-body'>$answer_row->answer_body</div>
                        <small class='time-sent'><time date='{$answer_row->time_sent}'>{$answer_row->answer_sent_date}</time></small>
                    </div>";

            if($answer_row->user_id === $logged_in_user_id) {
                $template .= "
                    <div class='answer-user-actions'>
                        <a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_id}/answer/{$answer_row->answer_id}/remove' role='button' class='delete-answer-btn'>Delete</a>
                        <a href='index.php?route=/user/{$logged_in_user_id}/question/{$question_id}/answer/{$answer_row->answer_id}/edit' role='button' class='edit-answer-btn'>Edit
                        </a>
                    </div>
                ";
            }

            $template .= "
                </article>
            ";
        }
    }
?>