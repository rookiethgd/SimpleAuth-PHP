<?php

$db_host = "localhost";
$db_user = "dbUsername";
$db_pass = "dbPassword";
$db_name = "dbName";

try {    
    //create PDO connection 
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    //show error
    die("ERROR: " . $e->getMessage());
}