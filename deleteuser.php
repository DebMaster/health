<?php
include("model.php");
$id=$_REQUEST['id'];
$model=new model;
$model->deleteAdmin($id);
header("Location: users.php?r=User+successfully+deleted")
?>