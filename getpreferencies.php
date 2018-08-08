<?php
require("model.php");
$email=$_REQUEST["email"];
$model=new model();
print_r($model->getMyPreferences($email));
?>