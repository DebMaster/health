<?php
$bmi=$_REQUEST['bmi'];
require_once("model.php");
$models=new model;
$group="Underweight";
if($bmi > 18.5 && $bmi < 24.9){
$group="Normal";	
}else if($bmi > 18.5){
	$group="Overweight";
}
$return=$models->getGroupAdvice($group);
$arr["results"]=$return;
print_r(json_encode($arr));
?>