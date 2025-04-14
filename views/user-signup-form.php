<?php
    $template = " 
                    <form method='post' action='index.php?route=/signup'>
                        <fieldset>
                            <legend>Create an account</legend>
                            <ul>
                                <li>
                                    <label for='username'>Username</label>
                                    <input id='username' type='text' placeholder='username...' name='username' maxlength=50 pattern='[A-Za-z]\w{3,30}' required title='Username should only start with alphabets containing only alphabets and underscore (_)'/>
                                </li>
                                <li>
                                    <label for='username'>Email</label>
                                    <input id='username' type='email' placeholder='email...' name='email' maxlength=150 required/>
                                </li>
                                <li>
                                    <label for='pwd'>Password</label>
                                    <input id='pwd' type='password' placeholder='password...' name='pwd' minlength=8 maxlength=100 pattern='(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}' required/>
                                </li>
                                <li>
                                    <label for='c-pwd'>Confirm password</label>
                                    <input id='c-pwd' type='password' placeholder='password...' name='confirm-pwd' minlength=8 maxlength=100 pattern='(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}' required/>
                                </li>
                                <li>
                                    <input type='submit' name='sign-up' value='Sign Up' />
                                </li>
                                <li>
                                    <a href='index.php?route=/login' role='button'>Already have an account</a>
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                "

?>