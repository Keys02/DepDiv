<?php
    function check_image_file($tmp_name, $variable_name) {
        if(!(($tmp_name == null) or ($tmp_name == ""))) {
            $max_size = 1 * (2**20); // Max file size of 1 MB

            $valid_file_types = array('image/jpeg' => 'jpg', 'image/png' => 'png');

            $image_file_is_valid = true;

            if(!isset($_FILES[$variable_name])) {
                $image_file_is_valid = false;
            } else {
                $info = new finfo(FILEINFO_MIME_TYPE);
                
                if(!$info) {
                    $image_file_is_valid = false;
                } else {
                    $mime_type = finfo_file($info, $tmp_name); //Returns image/jpg
                        if(!in_array($mime_type, array_keys($valid_file_types))) {
                            $image_file_is_valid = false;
                        } else {
                            if(filesize($_FILES[$variable_name]['tmp_name']) > $max_size) {
                                throw new Exception('⚠️ Image size must be less than 1MB');
                                $image_file_is_valid = false;
                            }
                            finfo_close($info);
                        }
                }
            }
        }
        return $image_file_is_valid;
    }
?>