<?php
    require __DIR__ . '/vendor/autoload.php';

    require_once('libs/commonArrayFunctions.php');    
    require_once('libs/commonTextFunctions.php');   
    require_once("controllers/TextAnalizer.php");
    require_once("controllers/DBInterface.php");
    require_once("controllers/FileSystemInterface.php");
    require_once("FileServiceFabric/FileServiceFabric.php");
    require_once("FileServiceFacade/FileServiceFacade.php");

    if(isset($_FILES[FileSystemInterface::INPUT_NAME]["name"])) {
        $filepath = FileSystemInterface::uploadFile();
        $fileExtension = FileSystemInterface::checkFileFormat($filepath);
        $service = FileServiceFabric::provideService($fileExtension);
        $fileFacade = new FileServiceFacade($service);
        $text = trim($fileFacade->getData($filepath));

    } else if(isset($_POST['text'])) {
        $text = trim($_POST['text']);
    }
    if(isset($text)) {
        echo('<p><pre>');
        $text = stripcslashes($text);
        $text = htmlspecialchars($text);
        $analize = new TextAnalizer($text);
        echo $analize;
        $data = $analize->prepareExportData();
        $forCSV = new FileServiceFacade(FileServiceFabric::createCSVService());
        $forXML = new FileServiceFacade(FileServiceFabric::createXMLService());
        $forXLSX = new FileServiceFacade(FileServiceFabric::createXLSXService());

        $forCSV->writeData($data, 'downloads/csvExample.csv');
        $forXML->writeData($data, 'downloads/xmlExample.xml');
        $forXLSX->writeData($data, 'downloads/xlsxExample.xlsx');

        echo('</pre><p>');
    }
?>