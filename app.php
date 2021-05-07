<?php
    require_once('libs/commonArrayFunctions.php');    
    require_once('libs/commonTextFunctions.php');   
    require_once("controllers/TextAnalizer.php");
    require_once("controllers/FileSystemInterface.php");
    require_once("FileServiceFabric/FileServiceFabric.php");
    require_once("FileServiceFacade/FileServiceFacade.php");

var_dump($_POST);

var_dump($_FILES);

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
        echo new TextAnalizer($text);
        echo('</pre><p>');
    }
?>