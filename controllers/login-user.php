<?php
    require_once  "models/User.php";
    $user = new User($database);

    if(isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['log-in'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $login_status_msg = $user->loginUser($username, $pwd);

        if($login_status_msg === "Login successful") {
            $logged_in_user_id = $user_login_session->getLoggedInUser();
            header("Location: index.php?route=/user/$logged_in_user_id");
        } else if($login_status_msg === "Password is incorrect") {
            $login_error_msg = $login_status_msg;
            include_once "views/user-login-form.php";
        } else if($login_status_msg === "Username does not exist") {
            $login_error_msg = $login_status_msg;
        }
    }
    
    include_once "views/user-login-form.php";
?>