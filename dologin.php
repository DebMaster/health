<?php
$phone=$_POST['phone'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->login($phone,md5($password));
if($return == null || count($return) == 0 ) {
header("Location: login.php?r=Sorry+could+not+login.");		
}else {
$count=count($return);
for($x=0;$x<$count;$x++) {	
$_SESSION['name']=$return[$x]['name'];	
$_SESSION['type']=$return[$x]['type'];	
$_SESSION['phone']=$return[$x]['phone'];	
$_SESSION['password']=$return[$x]['password'];
}
header("Location: index.php");	
}		
?>