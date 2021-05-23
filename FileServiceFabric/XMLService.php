<?php
    require_once("FileService.php");
    
    class XMLService extends AbstractFileService {
        public function open(String $filePath, String $modificator="w+"):void {
            $this->file = null;
            $this->filePath = $filePath;
            $this->filesize = 0;
        }
        public function write(array $data):void {
            $simplexml= new SimpleXMLElement('<?xml version="1.0"?><books/>');

            $analize= $simplexml->addChild('Data');
            foreach($data as $key => $value) {
                $analize->addChild($key, $value);    
            }

            file_put_contents($this->filePath, $simplexml->asXML());
        }
        public function close():void {}
    }