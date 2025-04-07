<?php
    $template = 
                "
                    <form method='post' action='index.php?page=post-question'>
                        <input type='hidden' name='user-id' value='{$logged_in_user_id}' />
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