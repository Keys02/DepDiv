<?php
    $template .= "
        <form method='post' action='index?question=$question_id'>
        <input type='hidden' value='{$user_login_session->getLoggedInUser()}'>
            <fieldset>
                <ul>
                    <li>
                        <label for='ans'>Answer</label>
                        <textarea id='ans' name='ans' required></textarea>
                    </li>
                    <li>
                        <input type='submit' value='submit answer' name='submit-answer' />
                    </li>
                </ul>
            </fieldset>
        </form>
    "
?>