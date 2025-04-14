<?php
    $template = " 
                    <form method='post' action='index.php?route=/login'>
                        <fieldset>
                            <legend>Login</legend>
                            <ul>
                                <li>
                                    <label for='username'>Username</label>
                                    <input id='username' type='text' placeholder='username...' name='username' required/>
                                </li>
                                <li>
                                    <label for='pwd'>Password</label>
                                    <input id='pwd' type='password' placeholder='password...' name='pwd' required/>
                                </li>
                            </ul>
                            <li>
                                <input type='submit' value='Log In' name='log-in' />
                            </li>
                            <li>
                                <a href='index.php?route=/signup-guest' role='button'>Create new account</a>
                            </li>
                        </fieldset>
                    </form>
                "
?>