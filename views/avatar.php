<?php
    // $avatar_upload_form = "
    //     <div class='avatar'>
    //         <img src='assets/imgs/$user_avatar' style='object-fit: cover; width: 100%; height: 100%; border-radius: 100%;' />
    //     </div>
    // ";

    $avatar_upload_form = "
        <form class='avatar-upload-form' method='post' action='index.php?route=/user/{$logged_in_user_id}' enctype='multipart/form-data'>
            <input class='avatar-upload' type='file' name='avatar' accept='image/jpeg' required/>
            <input type='submit' class='edit-avatar-btn' value='Edit avatar' name='upload-avatar' />
        </form>
    "
    
    //     $avatar_upload_form = "
    //     <form class='avatar-upload' method='post' action='index.php?route=/user/{$logged_in_user_id}' enctype='multipart/form-data'>
    //         <div class='avatar'>
    // ";

    // if(isset($user_avatar)) {
    //     $avatar_upload_form .= "<img src='assets/imgs/$user_avatar' style='object-fit: cover; width: 100%; height: 100%; border-radius: 100%;' />";
    // }

    // $avatar_upload_form .= "
    //         </div>
    //             <label for='avatar'>Upload avatar</label><br/>
    //             <input id='avatar' type='file' name='avatar' accept='image/jpeg' required/>
    //             <input type='submit' value='Upload' name='upload-avatar' />
    //     </form>
    // "
?>