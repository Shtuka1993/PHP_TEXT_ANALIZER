<?php
    require("FileService.php");
    
    class XLSXService implements FileService {
        public function open(String $filePath):void {

        }
        public function read():String {
            $data = '';

            return $data;
        }
        public function write(String $data):void {

        }
    }