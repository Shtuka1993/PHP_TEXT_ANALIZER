<?php
    require("FileService.php");
    
    class XMLService implements FileService {
        public function open(String $filePath):void {

        }
        public function read():String {
            $data = '';

            return $data;
        }
        public function write(String $data):void {

        }
    }