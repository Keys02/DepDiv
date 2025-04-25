<?php
    if($question_from_db->question_status === 1) {
        $template .= "
        <form class='answer-form' method='post' action='index.php?route=/user/$user_id/question/$question_id'>
        <input type='hidden' value='{$user_login_session->getLoggedInUser()}'>
            <fieldset>
                <ul>
                    <li>
                        <textarea id='summernote' class='ans' name='ans' required></textarea>
                    </li>
                    <li>
                        <input type='submit' class='submit-answer-btn' value='Comment' name='submit-answer' />
                    </li>
                </ul>
            </fieldset>
        </form>
    ";
    } else {
        $template .= "Question has been answered hence closed";
    }
?>