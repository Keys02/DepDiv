<?php
    require_once "models/Admin.php";
    $admin = new Admin($database);

    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pwd']) && isset($_POST['confirm-pwd']) && isset($_POST['sign-up'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $confirm_pwd = $_POST['confirm-pwd'];
        try{
            $admin->createNewAdmin($username, $email, $pwd, $confirm_pwd);
            header('Location: admin.php?route=/login');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    include_once "views/admin/admin-signup-form.php";
?>