<?php
    include_once "models/User.php";
    $user = new User($database);
    $logged_in_user_id = $user_login_session->getLoggedInUser();

    function upload() : string {
        include_once "models/ImageUploader.php";
        global $logged_in_user_id;
        global $user;

        $uploader = new ImageUploader('avatar');

        $uploader->saveIn("assets/imgs");

        try {
            $img_file_name = $uploader->save();
            $user->uploadAvatar($img_file_name, $logged_in_user_id);
            return "Image upload successful";
        }catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    if(isset($_FILES['avatar'])) {
        if(upload() === "Image upload succesful") {
            $user_old_avatar = $user->getUserAvatar($logged_in_user_id);
            unlink("assets/imgs/$user_old_avatar"); // Delete previous avatar from the database when a user is changing avatar
            header("Location: index.php?route=/user/$logged_in_user_id");
        } else {
            $message = upload();
        }
    }

    $user_avatar = $user->getUserAvatar($logged_in_user_id);

    include "views/avatar.php";
?>