<?php
    require_once "models/check-file.php";

    class ImageUploader {
        private string $file_name = "";
        private string $file_data = "";
        private string $destination = "";
        private string $key_value = "";
        
        public function __construct(string $key) {
            $this->key_value = $key;
            $this->file_name = $_FILES[$key]["name"];
            $this->file_data = $_FILES[$key]["tmp_name"];
        }
        
        /*********************
         *      Getters
        **********************/
        public function getFileName() : string {
            return $this->file_name;
        }

        public function getFileData() : string {
            return $this->file_data;
        }

        public function getDestination() : string {
            return $this->destination;
        }

        // Save the destination where the file will be moved
        public function saveIn(string $folder) : void {
            $this->destination = $folder;
        }

        //Check the validity of the file and save
        public function save() : ?string {
            $variable_name = $this->key_value;
            $folder_is_writable = is_writable($this->destination); //Check the destination folder if it's writable
            $image_valid = check_image_file($this->file_data, $variable_name); //Check a valid mime type image/jpeg is being uploaded
            if($image_valid and $folder_is_writable) {
                $img_file_extension = strrchr($this->file_name, ".");
                $img_assigned_name = "DepDiv_" . time() . rand(1000, 9999) . $img_file_extension;
                $destination_to_upload_image = "{$this->destination}/$img_assigned_name"; //Specify and rename the file to be uploaded
                move_uploaded_file($this->file_data, $destination_to_upload_image);
                return $img_assigned_name;
            } else {
                throw new Exception("An error occured uploading the image");
            }
        }

    }

?>