<?php
$name=$_POST['name'];
$logo=$_POST['logo2'];
include("model.php");
$model=new model;
if(isset($_FILES)) {   
$tempFile = $_FILES['logo']['tmp_name']; //3             
$fileName=$_FILES['logo']['name'];  
$file=$_FILES['logo']['name'];
$ufile="assets/uploads/".$file;
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); 
if($fileExt == "gif" || $fileExt == "png" || $fileExt =="jpeg" || $fileExt =="jpg"){//-->images
move_uploaded_file($tempFile,$ufile);
$logo=$ufile;	
}else {
echo $fileExt;
//header("Location: system.php?r=Cannot+add+non+image+file.");	
}	
}
$model->updateSystem($name,$logo);
header("Location: system.php?r=System+profile+updated+successfully.");	
?>