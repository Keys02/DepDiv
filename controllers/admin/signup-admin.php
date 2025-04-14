<?php
    require_once "models/User.php";
    $user = new User($database);

    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['confirm-pwd']) && isset($_POST['sign-up'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $confirm_pwd = $_POST['confirm-pwd'];

        try{
            $user->createNewUser($username, $email, $pwd, $confirm_pwd);
            header('Location: index.php?route=/login');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    include_once "views/admin/admin-signup-form.php";
?>