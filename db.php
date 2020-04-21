<?php
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