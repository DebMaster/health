<?php
$bmr=$_POST['bmr'];
$bmi=$_POST['bmi'];
$day=$_POST['day'];
$time=$_POST['time'];
$weight=$_POST['weight'];
$advice=$_POST['advice'];
require_once("model.php");
$models=new model;
$return=$models->meal($bmr,$bmi,$weight,$advice,$day,$time);
if($return == null) {
header("Location: newfood.php?r=Sorry+could+not+add+mea+plan.");		
}else {
header("Location: meals.php?r=Meals+has+been+added+successfully");	
}		
?>