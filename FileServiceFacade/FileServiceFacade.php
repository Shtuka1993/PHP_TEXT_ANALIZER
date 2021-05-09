<?php
    require_once('FileServiceFabric/FileService.php');
    
    class FileServiceFacade {
        private FileService $service;

        public function __construct(FileService $service) {
            $this->service = $service;
        }

        public function getData(String $filepath): String {
            $this->service->open($filepath, $this->service::MODIFICATORS['read']);
            $data = $this->service->read();
            $this->service->close();

            return $data;
        }

        public function writeData(array $data, String $filepath):String {
            $this->service->open($filepath, $this->service::MODIFICATORS['write new']);
            //foreach($data as $row){
                $this->service->write($data);
            //}
            $this->service->close();

            return $filepath;
        }
    }