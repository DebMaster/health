<?php
require_once __DIR__ . '/lib/vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;	
class model{
public $conn=null;
function __construct(){
if (session_status() == PHP_SESSION_NONE ) {
    session_start();
}	
include("connect.php");
$this->conn=connect();
}
	
public function register($name,$type,$phone,$password) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO admin (name,phone, type,password)
    VALUES (:name, :phone, :type, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':password', $password);
    $this->setNotification("New system user was added.");
    $stmt->execute();
    $return =true;
}
return $return;
}



public function advice($advice,$type) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO advice (type,message)
    VALUES (:type, :message)");
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':message', $advice);
    $stmt->execute();
    $this->setNotification("New advice added");
    $return =true;
}
return $return;
}

public function activity($advice,$type,$day,$time) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO activity(type,advice,day,time)
    VALUES (:type, :advice,:day,:time)");
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':advice', $advice);
	$stmt->bindParam(':time', $time);
	$stmt->bindParam(':day', $day);
    $stmt->execute();
    $this->setNotification("New activity added");
    $return =true;
}
return $return;
}

public function meal($bmr,$bmi,$weight,$advice,$day,$time) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO food(bmr,bmi,time,message,day,weight)
    VALUES (:bmr,:bmi,:time,:message,:day,:weight)");
    $stmt->bindParam(':bmr', $bmr);
    $stmt->bindParam(':bmi', $bmi);
	$stmt->bindParam(':time', $time);
	$stmt->bindParam(':day', $day);
	$stmt->bindParam(':message', $advice);
	$stmt->bindParam(':weight', $weight);
    $stmt->execute();
    $this->setNotification("New activity added");
    $return =true;
}
return $return;
}


public function getAdvice($id){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM advice WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    return $return; 
}

public function getGroupAdvice($group){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM advice WHERE type=:type LIMIT 7");
    $stmt->bindParam(':type', $group);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    return $return; 
}

public function activityadvice($id,$advice,$type,$time,$day){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("UPDATE activity SET advice=:advice, type=:type, time=:time,day=:day WHERE id=:id");
    $stmt->bindParam(':advice', $advice);
    $stmt->bindParam(':type', $type);
	$stmt->bindParam(':day', $day);
	$stmt->bindParam(':time', $time);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
        $this->setNotification("Advice updated");

    $return =true;
    
}
return $return;
}

public function updateadvice($id,$advice,$type){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("UPDATE advice SET message=:message, type=:type WHERE id=:id");
    $stmt->bindParam(':message', $advice);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
        $this->setNotification("Advice updated");

    $return =true;
    
}
return $return;
}

public function adviceDelete($id) {
    $stmt = $this->conn->prepare("DELETE FROM advice WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $this->setNotification("Advice deleted");
}

public function activityDelete($id) {
    $stmt = $this->conn->prepare("DELETE FROM activity WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $this->setNotification("Advice deleted");
}

public function setNotification($message) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO notifications (message)
    VALUES (:message)");
    $stmt->bindParam(':message', $message);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function ulandlord($name,$email,$phone,$password,$address,$id) {
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("UPDATE landlord SET name=:name,phone =:phone, email=:email,password=:password,address =:address WHERE id= :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function login($phone,$password){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE phone=:phone AND password=:password");
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    $this->setNotification("{$phone} logged in");
    return $return; 
}
public function mobile($email,$password){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE user.phone=:email AND user.password=:password LIMIT 1");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    $this->setNotification("{$email} logged in");
    return $return; 
}

public function getPreferencies($email){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM preference WHERE uid=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    $this->setNotification("{$email} logged in");
    return $return; 
}
public function getHistory($email){
    $return=null;
    $stmt = $this->conn->prepare("SELECT * FROM history WHERE uid=:email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();	
    $this->setNotification("{$email} logged in");
    return $return; 
}
public function getAllClients() {
    $stmt = $this->conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getUserDisease($id){
	$type="None";
    $stmt = $this->conn->prepare("SELECT * FROM user_disease WHERE uid=:uid");
    $stmt->bindParam(':uid', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    if(count($return) > 0) {
    	$type=$return[0]['type'];
    	}
    return $type;
}

public function getAllAdvice() {
    $stmt = $this->conn->prepare("SELECT * FROM advice");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllActivities() {
    $stmt = $this->conn->prepare("SELECT * FROM activity");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllMealPlans() {
    $stmt = $this->conn->prepare("SELECT * FROM food");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getMealPlans($time) {
    $stmt = $this->conn->prepare("SELECT * FROM food WHERE time=:time");
	$stmt->bindParam(':time', $time);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getGroupActivities($group,$bmr) {
    $stmt = $this->conn->prepare("SELECT * FROM activity WHERE type=:type OR type=:bmr");
    $stmt->bindParam(':type', $group);
	$stmt->bindParam(':bmr', $bmr);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getActivity($id) {
    $stmt = $this->conn->prepare("SELECT * FROM activity WHERE id=:id");
	$stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getSystem() {
    $stmt = $this->conn->prepare("SELECT * FROM system");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllStudents() {
    $stmt = $this->conn->prepare("SELECT * FROM student");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllLandlords() {
    $stmt = $this->conn->prepare("SELECT * FROM landlord");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllAdmins() {
    $stmt = $this->conn->prepare("SELECT * FROM admin");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getNotifications() {
    $stmt = $this->conn->prepare("SELECT * FROM notifications ORDER BY id DESC LIMIT 6");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getLandlord($id) {
    $stmt = $this->conn->prepare("SELECT * FROM landlord WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

	

public function updateuser($name,$type,$phone,$password,$id) {
$stmt = $this->conn->prepare("UPDATE admin SET name=:name,password=:password,phone=:phone,type=:type WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password);
    $this->setNotification("{$name}'s profile updated.");
    $stmt->execute();
    return true;
}

public function registerClient($name,$phone,$password){
$return =false;
if($this->conn != null) {
	$type='a';
$stmt = $this->conn->prepare("INSERT INTO user (name,password,phone)
    VALUES (:name, :password, :phone)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $return =true;
}
return $return;
}


public function updateclient($name,$type,$phone,$password,$id) {
$stmt = $this->conn->prepare("UPDATE user SET name=:name,password=:password,phone=:phone WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':password', $password);
    $this->setNotification("Client, {$name}, profile updated");
    $stmt->execute();


$stmt2 = $this->conn->prepare("UPDATE user_disease SET type=:type WHERE uid=:id");
    $stmt2->bindParam(':type', $type);
     $stmt2->bindParam(':id', $id);
    $stmt2->execute();



    return true;
}

public function deleteAdmin($id) {
    $stmt = $this->conn->prepare("DELETE FROM admin WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $this->setNotification("An administrator Account was deleted");
    return $return;
}

public function deleteClient($id) {
    $stmt = $this->conn->prepare("DELETE FROM user WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $this->setNotification("Client account deleted");
    return $return;
}

public function deleteMeal($id) {
    $stmt = $this->conn->prepare("DELETE FROM food WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $this->setNotification("Meal account deleted");
    return $return;
}


public function updateSystem($name,$logo) {
    $stmt = $this->conn->prepare("UPDATE system SET name =:name, logo=:logo WHERE id=:id");
    $id=1;
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':logo', $logo);
    $stmt->execute();
    $this->setNotification("System profile updated");
    return $return;
}

public function getAdmin($id) {
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE email=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getUser($id) {
    $stmt = $this->conn->prepare("SELECT * FROM admin WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getClient($id) {
    $stmt = $this->conn->prepare("SELECT * FROM user WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function getAllRooms($uid){
	 $stmt = $this->conn->prepare("SELECT asset.*,landlord.name AS landlord FROM asset,landlord WHERE asset.user_id=landlord.id");	
     if($uid != "") {      
    $stmt = $this->conn->prepare("SELECT asset.*,landlord.name AS landlord FROM asset,landlord WHERE asset.user_id=landlord.id AND landlord.id= :uid");
    $stmt->bindParam(':uid', $uid);
    }	 
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}

public function ldelete($id) {
    $stmt = $this->conn->prepare("DELETE FROM landlord WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

public function rdelete($id) {
    $stmt = $this->conn->prepare("DELETE FROM asset WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

public function addAsset($landlord,$images,$price,$per,$description){
$return =false;
if($this->conn != null) {
	$status='a';
$stmt = $this->conn->prepare("INSERT INTO asset (user_id,images,description,status,price,per)
    VALUES (:user, :images, :description, :status,:price,:per)");
    $stmt->bindParam(':user', $landlord);
    $stmt->bindParam(':images', $images);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':price', $price);
     $stmt->bindParam(':per', $per);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    $return =true;
}
return $return;
}





public function uroom($landlord,$price,$per,$description,$id){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("UPDATE asset SET user_id=:landlord,price =:price,per=:per,description=:description WHERE id= :id");
    $stmt->bindParam(':landlord', $landlord);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':per', $per);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function dateFormater($date){
$date = new DateTime($date);
return $date->format('F j, Y');
}
public function dayFromInteger($x){
	$days=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
	return $days[$x];
}

public function classifier($height,$weight,$bmi,$obese,$race,$physical_activity,$age,$waist_measurement,$gender){
    $stmt = $this->conn->prepare("SELECT * FROM history GROUP BY risks");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $results = $stmt->fetchAll();
	$all=array();
	$labels=array();	
	if($gender == "Male"){
	$g=1;	
}else{
	$g=2;
}
if($physical_activity == "Yes"){
	$pa=1;
}else{
	$pa=2;
}
if($obese == "Yes"){
	$o=1;
}else{
	$o=2;
}
if($race == "Black"){
	$r=1;
}else if($race == "White"){
	$r=2;
}else if($race == "Chinese"){
	$r=3;
}else if($race == "Indian"){
	$r=4;
}else if($race == "Colored"){
	$r=5;
}else{
	$r=6;
}


	    $cprofile[0]=$height;
		$cprofile[1]=$weight;
		$cprofile[2]=$bmi;
		$cprofile[3]=$o;
		$cprofile[4]=$r;
		$cprofile[5]=$pa;
		$cprofile[6]=$age;
		$cprofile[7]=$waist_measurement;
		$cprofile[8]=$g;
	for($x=0;$x<count($results);$x++){
			if($results[$x]['gender'] == "Male"){
	$g=1;	
}else{
	$g=2;
}
if($physical_activity == "Yes"){
	$pa=1;
}else{
	$pa=2;
}
if($results[$x]['obese'] == "Yes"){
	$o=1;
}else{
	$o=2;
}
if($results[$x]['race'] == "Black"){
	$r=1;
}else if($race == "White"){
	$r=2;
}else if($race == "Chinese"){
	$r=3;
}else if($race == "Indian"){
	$r=4;
}else if($race == "Colored"){
	$r=5;
}else{
	$r=6;
}
		$profile[0]=$results[$x]['height'];
		$profile[1]=$results[$x]['weight'];
		$profile[2]=$results[$x]['bmi'];
		$profile[3]=$o;
		$profile[4]=$r;
		$profile[5]=$pa;
		$profile[6]=$results[$x]['age'];
		$profile[7]=$results[$x]['waist_measurement'];
		$profile[8]=$g;
		array_push($all,$profile);
		array_push($labels,$results[$x]['risks']);
	}
//$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
//$labels = ['a', 'a', 'a', 'b', 'b', 'b'];
$classifier = new KNearestNeighbors();
$classifier->train($all, $labels);
return $classifier->predict($cprofile);	
}
public function addProfile($height,$weight,$bmi,$obese,$race,$active,$age,$waist,$gender,$risk,$bmr,$email){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO 
	history(height,weight,bmi,obese,race,physical_activity,age,waist_measurement,gender,risks,bmr,uid) 
	VALUES 
	(:height,:weight,:bmi,:obese,:race,:physical_activity,:age,:waist_measurement,:gender,:risks,:bmr,:uid)");
    $stmt->bindParam(':height', $height);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':bmi', $bmi);
    $stmt->bindParam(':obese', $obese);
    $stmt->bindParam(':race', $race);
    $stmt->bindParam(':physical_activity', $active);
    $stmt->bindParam(':age', $age);
	$stmt->bindParam(':waist_measurement', $waist);
	$stmt->bindParam(':gender', $gender);
	$stmt->bindParam(':risks', $risk);
	$stmt->bindParam(':bmr', $bmr);
	$stmt->bindParam(':uid', $email);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function addUser($name,$email,$password){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO 
	user(name,password,phone) 
	VALUES 
	(:name,:password,:phone)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $email);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function addUserPreferences($bmr,$email,$one,$two,$three,$four){
$return =false;
if($this->conn != null) {
$stmt = $this->conn->prepare("INSERT INTO preference
	(one,two,three,four,five,uid) 
	VALUES 
	(:one,:two,:three,:four,:five,:uid)");
    $stmt->bindParam(':one', $one);
    $stmt->bindParam(':two', $two);
    $stmt->bindParam(':three', $three);
	$stmt->bindParam(':four', $four);
	$stmt->bindParam(':five', $bmr);
	$stmt->bindParam(':uid', $email);
    $stmt->execute();
    $return =true;
}
return $return;
}

public function getMyPreferences($email) {
    $stmt = $this->conn->prepare("SELECT * FROM preference WHERE uid=:uid");
    $stmt->bindParam(':uid', $email);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $return = $stmt->fetchAll();
    return $return;
}



}
?>