<?php
$advice=$_POST['advice'];
$type=$_POST['type'];
require_once("model.php");
$models=new model;
$return=$models->advice($advice,$type);
if($return == null) {
header("Location: newadvice.php?r=Sorry+could+not+add+advice.");		
}else {
header("Location: advice.php?r=Advice+has+been+added+successfully");	
}		

?>