<?php
require_once("model.php");
$name=$_POST["name"];
$age=(int)$_POST["age"];
$email=$_POST["email"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$height=(double)$_POST["height"];
$weight=(double)$_POST["weight"];
$waist=(double)$_POST["waist"];
$race=$_POST["race"];
$active=$_POST["active"];
$bmi=round((double)$_POST["bmi"],0);
$bmr=$_POST["bmr"];
$obese="No";
if($bmi >= 30){
	$obese="Yes";
}
$models=new model;
$risk=$models->classifier($height,$weight,$bmi,$obese,$race,$active,$age,$waist,$gender);
$models->addProfile($height,$weight,$bmi,$obese,$race,$active,$age,$waist,$gender,$risk,$bmr,$email);         
$models->addUser($name,$email,md5($password));
$result["result"]=$risk;
print_r(json_encode($result));
?>