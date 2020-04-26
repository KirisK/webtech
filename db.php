<?php
/*$servername = "localhost";*/
/*
$servername = "anysql.itcollege.ee";
$username = "root";
$password = "xrD97scM2Q";
$database = "WT22";

$mysql = new mysqli($servername, $username, $password, $database);
if ($mysql->connect_errno){
    die("Connection to Database failed :".$mysql->connect_errno);
} else{
    echo "Successfully connected to Database";
}

*/
//using PDO connection method works for me, mysqli just breaks all the time.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_BASE', 'temp');


try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_BASE, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}



