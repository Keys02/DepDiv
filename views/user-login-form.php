<?php
    $template = " 
                    <form method='post' action='login-user.php'>
                        <fieldset>
                            <legend>Login</legend>
                            <ul>
                                <li>
                                    <label for='username'>Username</label>
                                    <input id='username' type='text' placeholder='username...' name='username' required/>
                                </li>
                                <li>
                                    <label for='username'>Email</label>
                                    <input id='username' type='email' placeholder='email...' name='email' required/>
                                </li>
                                <li>
                                    <label for='pwd'>Password</label>
                                    <input id='pwd' type='password' placeholder='password...' name='pwd' required/>
                                </li>
                            </ul>
                            <li>
                                <input type='submit' value='Log In' />
                            </li>
                            <li>
                                <a href='index.php?page=signup'>Create new account</a>
                            </li>
                        </fieldset>
                    </form>
                "
?>