<?php
require_once("model.php");
$models=new model;
$rid=$_REQUEST['rid'];
$models->rdelete($rid);
header("Location: rooms.php?r=Room+successfully+deleted");
?>