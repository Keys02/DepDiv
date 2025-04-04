<?php
    $template = " 
                    <form method='post' action='user-register-form.php'>
                        <fieldset>
                            <legend>Create an account</legend>
                            <ul>
                                <li>
                                    <label for='username'>Username</label>
                                    <input id='username' type='text' placeholder='username...' name='username' maxlength=50 required/>
                                </li>
                                <li>
                                    <label for='username'>Email</label>
                                    <input id='username' type='email' placeholder='email...' name='email' maxlength=150 required/>
                                </li>
                                <li>
                                    <label for='pwd'>Password</label>
                                    <input id='pwd' type='password' placeholder='password...' name='pwd' maxlength=100 required/>
                                </li>
                            </ul>
                            <li>
                                <input type='submit' value='Sign Up' />
                            </li>
                            <li>
                                <a href='index.php?page=login'>Already have an account</a>
                            </li>
                        </fieldset>
                    </form>
                "

?>