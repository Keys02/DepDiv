<?php
    $template = "
                    <form method='post' action='index.php?route=/user/$logged_in_user_id/editor&question=$question_from_db->question_id'>
                        <input type='hidden' name='question-id' value='{$question_from_db->question_id}' />
                        <fieldset>
                            <legend><span>Post a question</span></legend>
                            <ul>
                                <li>
                                    <label for='qtn'>Question</label>";
    $template .= '<input id="qtn" type="text" name="qtn" value="' . $question_from_db->question_body . '"required />';
    $template .= "               </li>
                                <li>
                                    <input type='submit' name='post-qtn'";                                    
    if($question_from_db->question_id === 0) {
        $template .= "value='Post Question' />";
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