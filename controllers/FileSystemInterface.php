<?php
    class FileSystemInterface {

        const INPUT_NAME = "file";
        const ALLOVED_FILE_TYPES = ["txt", "csv", "html", "xml", "xlsx"];
        const FILE_MAX_SIZE = 500000;

        const UPLOAD_DIR = "uploads";
        const DOWNLOAD_DIR = "downloads";

        public static function checkFileFormat(String $filename):String {
            $file_parts = pathinfo($filename);

            return $file_parts['extension'];
        }

        public static function uploadFile() {  
            // Prepared variables    
            $target_dir = self::UPLOAD_DIR;
            $target_file = $target_dir . '/' . basename($_FILES[self::INPUT_NAME]["name"]);
            $uploadOk = true;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES[self::INPUT_NAME]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = true;
                } else {
                    echo "File is not an image.";
                    $uploadOk = false;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = false;
            }

            // Check file size
            if ($_FILES[self::INPUT_NAME]["size"] > self::FILE_MAX_SIZE) {
                echo "Sorry, your file is too large.";
                $uploadOk = false;
            }
    
            // Allow certain file formats
            if( ! in_array($imageFileType, self::ALLOVED_FILE_TYPES) ) {
                echo "Sorry, only ".strtoupper(implode(",", self::ALLOVED_FILE_TYPES))." files are allowed.";
                $uploadOk = false;
            }
    
            // Check if $uploadOk is set to 0 by an error
            if (!$uploadOk) {
                echo "Sorry, your file was not uploaded.";

                return false;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[self::INPUT_NAME]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES[self::INPUT_NAME]["name"])). " has been uploaded.";

                    return $target_file;
                } else {
                    echo "Sorry, there was an error uploading your file.";

                    return false;
                }
            }

        }
    }