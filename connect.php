<?php

function connect(){
$servername = "localhost";
$username = "root";
$password = "";
$return = null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=health", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $return=$conn; 
  }
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
    return $return;
    }
?>