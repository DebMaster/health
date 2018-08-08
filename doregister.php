<?php
$name=$_POST['name'];
$type=$_POST['type'];
$phone=$_POST['phone'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->register($name,$type,$phone,md5($password));
if($return == null) {
header("Location: register.php?r=Sorry+could+not+register+user.");		
}else {
header("Location: users.php?r=User+successfully+added");	
}		

?>