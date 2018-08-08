<?php
include("model.php");
$id=$_REQUEST['id'];
$model=new model;
$model->deleteClient($id);
header("Location: clients.php?r=Client+successfully+deleted")
?>