<?php
    interface FileService {
        public function open(String $filePath):void;
        public function read():String;
        public function write(array $data):void;
        public function close():void;
    }