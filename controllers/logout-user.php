<?php
    if(isset($_POST['log-out'])) {
        $_SESSION['logged-in'] = false;
        header('Location: index.php?page=login');
    }
    include_once "views/user-logout-form.php";
?>