<!-- <?php
    $template = "
                    <form method='post' action='index.php?page=post-question&id=$question_id'>
                        <input type='hidden' name='user-id' value='{$question_id}' />
                        <fieldset>
                            <legend><span>Post a question</span></legend>
                            <ul>
                                <li>
                                    <label for='qtn'>Question</label>";
    $template .= '<input id="qtn" type="text" name="qtn" value="' . $question_from_db->question_body . '"required />';
    $template .= "               </li>
                                <li>
                                    <input type='submit' name='post-qtn' value='Post Question' />
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                ";
?> -->