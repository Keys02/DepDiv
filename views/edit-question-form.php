<?php
    $template = "
                    <form method='post' action='index.php?page=edit-question &id='>
                        <input type='hidden' name='user-id' value='{$question_id}' />
                        <fieldset>
                            <legend><span>Post a question</span></legend>
                            <ul>
                                <li>
                                    <label for='qtn'>Question</label>
                                    <input id='qtn' type='text' name='qtn' required />
                                </li>
                                <li>
                                    <input type='submit' name='post-qtn' value='Post Question' />
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                "
?>