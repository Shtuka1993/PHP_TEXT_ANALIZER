<?php
    require_once("FileService.php");
    
    class XLSXService extends AbstractFileService {
        public function open(String $filePath, String $modificator="w+"):void {
            $this->file = null;
            $this->filePath = $filePath;
            $this->filesize = 0;
        }
        public function write(array $data):void {
            $items = [];
            foreach($data as $key => $value) {
                $items[] = [$key, $value];
            }
            SimpleXLSXGen::fromArray( $items )->saveAs($this->filePath);
        }
        public function close():void {}
    }