<?php
    if(isset($_POST['log-out'])) {
        $user_login_session->logOut();
        header('Location: index.php');
    }
    include_once "views/user-logout-form.php";
?>