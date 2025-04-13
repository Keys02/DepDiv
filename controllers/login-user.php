<?php
    require_once  "models/User.php";
    $user = new User($database);

    if(isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['log-in'])) {
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];
        $login_status_msg = $user->loginUser($username, $pwd);

        if($login_status_msg === "Login successful") {
            header("Location: index.php");
        } else if("Password is incorrect") {
            echo $login_status_msg;
            include_once "views/user-login-form.php";
        }
    } else {
        include_once "views/user-login-form.php";
    }
?>