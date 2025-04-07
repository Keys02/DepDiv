<?php
    require_once "models/User.php";
    $user = new User($database);

    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['sign-up'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        try{
            $user->createNewUser($username, $email, $pwd);
            header('Location: index.php?page=login');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    include_once "views/user-signup-form.php";
?>