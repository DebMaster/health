<?php
$advice=$_POST['advice'];
$type=$_POST['type'];
$time=$_POST['time'];
$day=$_POST['day'];
$id=$_POST['id'];
require_once("model.php");
$models=new model;
$return=$models->activityadvice($id,$advice,$type,$time,$day);
if($return == null) {
header("Location: activityupdate.php?id={$id}&r=Sorry+could+not+update+the+advice.");		
}else {
header("Location: activities.php?r=Advice+has+been+updated+successfully");	
}		

?>