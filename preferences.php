<?php
require_once("model.php");
$one=$_POST["one"];
$two=$_POST["two"];
$three=$_POST["three"];
$four=$_POST["four"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$bmr=$_POST["bmr"];
$bmrGroup="Normal";


/*
Average in women = 1490 calories, < 1490 = low BMR, >1490 = high BMR
Average in men = 1660 calories, < 1660 = low BMR, > 1660 = high BMR
*/
if($bmr < 1490 && $gender=="Female"){
$bmrGroup="Low";
}else if($bmr > 1490 && $gender=="Female"){
$bmrGroup="Hie";	
}else if($bmr < 1660 && $gender=="Male"){
	$bmrGroup="Low";	
}else if($bmr > 1660 && $gender=="Male"){
	$bmrGroup="Low";
}
$models=new model;
$models->addUserPreferences($bmrGroup,$email,$one,$two,$three,$four);
$result["result"]="data saved";
print_r(json_encode($result));
?>