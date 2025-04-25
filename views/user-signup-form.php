<?php
    $template = "
                    <section id='signup-form-section'>
                        <form class='signup-form' method='post' action='index.php?route=/signup-guest'>
                            <fieldset>
                                <legend>Create an account</legend>
                                <ul>
                                    <li>
                                        <input id='username' type='text' name='username' maxlength=50 pattern='[A-Za-z]\w{3,30}' required title='Username should only start with alphabets containing only alphabets and underscore (_)'/>
                                        <label for='username'>Username</label>
                                    </li>
                                    <li>
                                        <input id='email' type='email' name='email' maxlength=150 required/>
                                        <label for='email'>Email</label>
                                    </li>
                                    <li>
                                        <input id='pwd' type='password' name='pwd' minlength=8 maxlength=100 pattern='(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}' required/>
                                        <label for='pwd'>Password</label>
                                    </li>
                                    <li>
                                        <input id='c-pwd' type='password' name='confirm-pwd' minlength=8 maxlength=100 pattern='(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!@-])[a-zA-Z0-9!@_-]{8,}' required/>
                                        <label for='c-pwd'>Confirm password</label>
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
                    </section>
                "

?>