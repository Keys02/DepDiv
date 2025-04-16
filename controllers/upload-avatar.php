<?php
    include_once "models/User.php";
    $user = new User($database);
    $logged_in_user_id = $user_login_session->getLoggedInUser();

    function upload(){
        include_once "models/ImagesUploader.php";
        global $logged_in_user_id;
        global $user;

        $uploader = new ImagesUploader('avatar');

        $uploader->saveIn("assets/imgs");

        try {
            $img_file_name = $uploader->save();
            $user->uploadAvatar($img_file_name, $logged_in_user_id);
        }catch (Throwable $e) {
            $e->getMessage();
        }
    }

    if(isset($_FILES['avatar']) && isset($_POST['upload-avatar'])) {
        upload();
        header("Location: index.php?route=/user/$logged_in_user_id");
    }

    $user_avatar = $user->getUserAvatar($logged_in_user_id);
    
    include "views/avatar.php";
?>