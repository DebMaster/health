<?php
$advice=$_POST['advice'];
$type=$_POST['type'];
$day=$_POST['day'];
$time=$_POST['time'];
require_once("model.php");
$models=new model;
$return=$models->activity($advice,$type,$day,$time);
if($return == null) {
header("Location: newactivity.php?r=Sorry+could+not+add+advice.");		
}else {
header("Location: activities.php?r=Activity+has+been+added+successfully");	
}		

?>