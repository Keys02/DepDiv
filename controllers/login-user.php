<?php
    require_once  "models/User.php";
    $user = new User($database);

    if(isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['log-in'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $login_status_msg = $user->checkCredentials($username, $pwd);

        if($login_status_msg === "Login successful") {
            $user_login_session->logIn();
            $user_login_session->setLoggedInUser($username);
            header('Location: index.php');
        } else {
            echo $login_status_msg;
        }
    } else {
        include_once "views/user-login-form.php";
    }
?>