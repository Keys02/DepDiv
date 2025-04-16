<?php
    $avatar_upload_form = "
        <form method='post' action='index.php?route=/user/{$logged_in_user_id}' enctype='multipart/form-data'>
            <div style='background-color: grey; width: 50px; height: 50px; border-radius: 100%;' class='avatar-upload'>
                <img src='assets/imgs/me.jpg' style='object-fit: contain; width: 100%; height: 100%; border-radius: 100%;' />
            </div>
                <label for='avatar'>Upload avatar</label><br/>
                <input id='avatar' type='file' name='avatar' accept='image/jpeg' required/>
                <input type='submit' value='Upload' name='upload-avatar' />
        </form>
    "
?>