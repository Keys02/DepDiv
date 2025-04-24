<?php
    $template = "
                    <form method='post' class='editor' action='index.php?route=/user/$logged_in_user_id/editor&question=$question_from_db->question_id'>
                        <input type='hidden' name='question-id' value='{$question_from_db->question_id}' />
                        <fieldset>
                            <legend><span>Post question</span></legend>
                            <ul>
                                <li>
                                    <label for='title'>Title</label>
                                    <input id='title' type='text' />
                                </li>
                                <li>";
    $template .= '<textarea id="summernote" name="qtn">' .$question_from_db->question_body . '</textarea>';

    $template .= "</li>
                                <li>
                                    <input type='submit' name='post-qtn'";                                    
    if($question_from_db->question_id === 0) {
        $template .= "value='Post' />";
    } else {
        $template .= "value='Save' />";
    }

    $template .= "
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                ";
?>