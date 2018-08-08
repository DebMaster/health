<?php
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['password'];
require_once("model.php");
$models=new model;
$return=$models->registerClient($name,$phone,$password);
if($return == null) {
echo "fail";
}else {
echo "success";
}	
?>