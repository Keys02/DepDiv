<?php
    $template = "
        <h2>$question_from_db->question_title</h2>
        <form class='edit-answer-form' method='post' action='index.php?route=/user/{$logged_in_user_id}/question/{$question_id}/answer/{$answer_id}/edit'>
            <fieldset>
                <ul>
                    <li>
                        <textarea id='summernote' class='ans' name='ans' required>{$answer_from_db->answer_body}</textarea>
                    </li>
                    <li>
                        <input type='submit' class='submit-answer-btn' value='Save' name='save' />
                    </li>
                </ul>
            </fieldset>
        </form>
    "
?>