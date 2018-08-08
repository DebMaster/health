<?php
include("model.php");
$id=$_REQUEST['id'];
$model=new model;
$model->deleteMeal($id);
header("Location: meals.php?r=Meal+successfully+deleted")
?>