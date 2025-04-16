<?php
    $logged_in_user_id = $user_login_session->getLoggedInUser();

    function upload(){
        include_once "models/ImagesUploader.php";

        $uploader = new ImagesUploader('avatar');

        $uploader->saveIn("assets/imgs");

        try {
            $file_name = $uploader->save();
        }catch (Throwable $e) {
            $e->getMessage();
        }
    }

    if(isset($_FILES['avatar']) && isset($_POST['upload-avatar'])) {
        upload();
        header("Location: index.php?route=/user/$logged_in_user_id");
    }
    include "views/avatar.php";
?>