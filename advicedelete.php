<?php
require_once("model.php");
$models=new model;
$id=$_REQUEST['id'];
$models->adviceDelete($id);
header("Location: advice.php?r=Advice+successfully+deleted");
?>