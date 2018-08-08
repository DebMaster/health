<?php
require_once("model.php");
$models=new model;
$id=$_REQUEST['id'];
$models->activityDelete($id);
header("Location: activities.php?r=Activity+successfully+deleted");
?>