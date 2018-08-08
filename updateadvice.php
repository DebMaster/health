<?php
$advice=$_POST['advice'];
$type=$_POST['type'];
$id=$_POST['id'];
require_once("model.php");
$models=new model;
$return=$models->updateadvice($id,$advice,$type);
if($return == null) {
header("Location: adviceupdate.php?id={$id}&r=Sorry+could+not+update+the+advice.");		
}else {
header("Location: advice.php?r=Advice+has+been+updated+successfully");	
}		

?>