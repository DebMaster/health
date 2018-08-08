<?php
$name=$_POST['name'];
$type=$_POST['type'];
$phone=$_POST['phone'];
$id=$_POST['id'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->updateuser($name,$type,$phone,$password,$id);
if($return == null) {
header("Location: updateuser.php?id={$id}&r=Sorry+could+not+update+user.");		
}else {
header("Location: users.php?r=User+successfully+updated");	
}		

?>