<?php
require_once __DIR__ . '/lib/vendor/autoload.php';
require_once("model.php");
use Phpml\Classification\KNearestNeighbors;	
$bmi=$_POST['bmi'];
$bmr=$_POST['bmr'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$time=$_POST['time'];
$day=$_POST['day'];
$models=new model;
$weight=0;
$prefs=$models->getMyPreferences($email);
$group="Low";
if($bmi <= 25){
$weight +=1;	
}else{
	$weight +=2;
}
if($bmr < 1490 && $gender=="Female"){
$weight +=1;
}else if($bmr > 1490 && $gender=="Female"){
$weight +=2;	
}else if($bmr < 1660 && $gender=="Male"){
	$weight +=1;	
}else if($bmr > 1660 && $gender=="Male"){
	$weight +=2;
}

if(count($prefs) > 0){
if(strpos($prefs[0]['one'], "No") !== false){
	$weight +=2;
}else if(strpos($prefs[0]['one'], "Pescatarian") !== false){
	$weight +=3;
}else if(strpos($prefs[0]['one'], "Vegan") !== false){
	$weight +=4;
}else if(strpos($prefs[0]['one'], "Meatatarian ") !== false){
	$weight +=5;
}

if(strpos($prefs[0]['two'], "Skip") !== false){
	$weight +=2;
}else if(strpos($prefs[0]['two'], "Dairy") !== false){
	$weight +=3;
}else if(strpos($prefs[0]['two'], "Cereal") !== false){
	$weight +=4;
}else if(strpos($prefs[0]['two'], "Refined") !== false){
	$weight +=5;
}

if(strpos($prefs[0]['three'], "None") !== false){
	$weight +=2;
}else if(strpos($prefs[0]['three'], "Gluten") !== false){
	$weight +=3;
}else if(strpos($prefs[0]['three'], "Dairy") !== false){
	$weight +=4;
}else if(strpos($prefs[0]['three'], "Pregnant") !== false){
	$weight +=5;
}

if(strpos($prefs[0]['four'], "Starch") !== false){
	$weight +=2;
}else if(strpos($prefs[0]['four'], "Protein") !== false){
	$weight +=3;
}else if(strpos($prefs[0]['four'], "Fat") !== false){
	$weight +=4;
}
}
//now lets do KNN on returned data
$results=$models->getMealPlans($time);
$all=array();
$labels=array();
$cprofile[1]=$weight;
$cprofile[0]=$day;
$count=count($results);
for($x=0; $x< $count; $x++){
		$profile[1]=$results[$x]['weight'];
		$profile[0]=$results[$x]['day'];
		array_push($all,$profile);
		array_push($labels,$results[$x]['message']);
}
$classifier = new KNearestNeighbors();
$classifier->train($all, $labels);
$arr["results"]=$classifier->predict($cprofile);
print_r(json_encode($arr));
?>