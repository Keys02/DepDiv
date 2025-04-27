<?php
    include_once "models/User.php";
    $user = new User($database);
    $logged_in_user_id = $user_login_session->getLoggedInUser();

    function upload() {
        include_once "models/ImageUploader.php";
        global $logged_in_user_id;
        global $user;

        $uploader = new ImageUploader('avatar');

        $uploader->saveIn("assets/imgs");

        try {
            $img_file_name = $uploader->save();
            $user_old_avatar = $user->getUserAvatar($logged_in_user_id);

            // Check if the user's profile is the default image when a new account is created
            if($user_old_avatar !== "default.jpeg") {
                unlink("assets/imgs/$user_old_avatar"); // Delete previous avatar from the database when a user is changing avatar
            }
            $user->uploadAvatar($img_file_name, $logged_in_user_id);
            return "Image upload successful";
        }catch (Throwable $e) {
            return $e->getMessage();
        }
    }

    if(isset($_FILES['avatar'])) {
        if(upload() === "Image upload successful") {
            header("Location: index.php?route=/user/$logged_in_user_id");
        } else {
            $upload_msg = upload();
        }
    }

    $user_avatar = $user->getUserAvatar($logged_in_user_id);

    include "views/avatar.php";
?>