<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->landlord($name,$email,$phone,$password,$address);
if($return == null) {
header("Location: newlandlord.php?r=Sorry+could+not+register+user.");		
}else {
header("Location: landlords.php?r=Landlord+successfully+added.");	
}		

?>