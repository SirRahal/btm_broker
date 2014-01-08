<?php require_once("maxImageUpload.class.php"); ?>

   <link href="style/style.css" rel="stylesheet" type="text/css" />

<?php
    $myImageUpload = new maxImageUpload(); 
    //$myUpload->setUploadLocation(getcwd().DIRECTORY_SEPARATOR);
    $myImageUpload->uploadImage();
?>
   