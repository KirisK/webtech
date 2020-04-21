<?php
//include database connection data
include_once "db.php";


// for now the Service form just leads back to the homepage.
// Thinking of making it basically a login with just a name, where you could see your listed service requests, but this would require MSQL, so it will be skipped for now.

    header("Location: html/redirect.html");
    //header("Refresh: 5, Location: http://localhost/webtech/html/home.html?_ijt=88c49rui9mnfi0b87shpkua66e");
    //header("Refresh: 5, Location: html/home.html?_ijt=88c49rui9mnfi0b87shpkua66e");

