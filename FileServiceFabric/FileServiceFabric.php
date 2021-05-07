<?php
    require_once('FileServiceFabric/CSVService.php');
    require_once('FileServiceFabric/HTMLService.php');
    require_once('FileServiceFabric/TXTService.php');
    require_once('FileServiceFabric/XLSXService.php');
    require_once('FileServiceFabric/XMLService.php');

    class FileServiceFabric {
        public static function createCSVService():FileService {
            return new CSVService();
        }
        public static function createHTMLService():FileService {
            return new HTMLService();
        }
        public static function createTXTService():FileService {
            return new TXTService();
        }
        public static function createXLSXService():FileService {
            return new XLSXService();
        }
        public static function createXMLService():FileService {
            return new XMLService();
        }

        public static function provideService(String $type):FileService {
            $methodName = 'create'.strtoupper($type).'Service';

            return self::{$methodName}();
        }
    }