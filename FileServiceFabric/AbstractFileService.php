<?php
    require_once("FileService.php");

    class AbstractFileService implements FileService {
        private $file;
        private $filePath;
        private $fileSize;
        const  MODIFICATORS = [
            "read" => "r",
            "write new" => "w",
            "write add" => "a",
        ];
        public function open(String $filePath, String $modificator="w+"):void {
            $this->file = fopen($filePath, $modificator);
            $this->filePath = $filePath;
            $this->filesize = filesize($filePath);
        }
        public function read():String {
            $data = fread($this->file, $this->filesize);

            return $data;
        }
        public function write(String $data):void {
            fwrite($this->file, $data);
        }
        public function close():void {
            fclose($this->file);
        }
    }