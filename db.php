<?php

$db = "mysql" ;
$host = "localhost";
$user = "root";
$pass = "ibrahimKHANTACH2004";
$dbname = "loginSysteme";

try{
    $conn = new PDO("$db:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();  
}

?>