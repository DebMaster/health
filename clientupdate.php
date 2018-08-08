<?php
$name=$_POST['name'];
$type=$_POST['type'];
$phone=$_POST['phone'];
$id=$_POST['id'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->updateclient($name,$type,$phone,$password,$id);
if($return == null) {
header("Location: updateclient.php?id={$id}&r=Sorry+could+not+update+client.");		
}else {
header("Location: clients.php?r=Client+successfully+updated");	
}		

?>