<?php
    require_once("AbstractFileService.php");
    
    class CSVService extends AbstractFileService {
        public function open(String $filePath, String $modificator="w+"):void {
            $this->file = null;
            $this->filePath = $filePath;
            $this->filesize = 0;
        }
        public function write(array $data):void {
            $this->file = fopen($this->filePath, "wb");
            foreach($data as $key => $value) {
                fputcsv($this->file, [$key, $value]);
            }
        }
        public function close():void {}
    }