<?php
    $avatar_upload_form = "
        <form class='avatar-upload-form' method='post' action='index.php?route=/user/{$logged_in_user_id}' enctype='multipart/form-data'>
            <input class='avatar-upload' type='file' name='avatar' accept='image/jpeg, image/png' required/>
            <input type='submit' class='edit-avatar-btn' value='Edit avatar' name='upload-avatar' />
        </form>
    "
?>