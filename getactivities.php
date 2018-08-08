<?php
$bmi=$_REQUEST['bmi'];
$bmr=$_REQUEST['bmr'];
$gender=$_REQUEST['gender'];
require_once("model.php");
$models=new model;
$group="Underweight";
if($bmi > 18.5 && $bmi < 24.9){
$group="Normal";	
}else if($bmi > 18.5){
	$group="Overweight";
}
$bmrGroup="Low BMR";
if($gender == "Female" && $bmr > 1490){
	$bmrGroup="High BMR";	
}
if($gender == "Male" && $bmr > 1660){
	$bmrGroup="High BMR";	
}
$return=$models->getGroupActivities($group,$bmrGroup);
//$return=$models->getAllActivities();
$arr["results"]=$return;
print_r(json_encode($arr));
?>