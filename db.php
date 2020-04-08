<?php
//This is old code I had left from last semester from another course, will be useful next week.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'parool');
define('DB_BASE', 'WT22');


$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);