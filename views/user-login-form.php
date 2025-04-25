<?php
    $template = " 
                <section id='login-form-section'>
    ";

    if(isset($login_error_msg)) {
        $template .= "<p class='auth-error'>{$login_error_msg}</p>";
    }

    $template .= "
                    <form class='login-form' method='post' action='index.php?route=/login'>
                        <fieldset>
                            <legend><span class='form-heading'>Login</span></legend>
                            <ul>
                                <li>
                                    <input id='username' type='text' name='username' required/>
                                    <label for='username'>Username</label>
                                </li>
                                <li>
                                    <input id='pwd' type='password' name='pwd' required/>
                                    <label for='pwd'>Password</label>
                                </li>
                                <li>
                                    <input type='submit' value='Log In' name='log-in' />
                                </li>
                                <li>
                                    <a href='index.php?route=/signup-guest' role='button'>Create new account</a>
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                </section>
                "
?>