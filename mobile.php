<?php
require_once("model.php");
$email=$_POST["email"];
$password=$_POST["password"];
$models=new model;
$user=$models->mobile($email,md5($password));
$pref=array();
$history=array();
if(count($user) > 0){
	$email=$user[0]["phone"];
	$pref=$models->getPreferencies($email);
	$history=$models->getHistory($email);
	$new1=array_merge($user,$history);
	//$new2=array_merge($new1,$pref);
$result["results"]=$new1;
	}else{
$result["results"]=$user;
	}
print_r(json_encode($result));
?>