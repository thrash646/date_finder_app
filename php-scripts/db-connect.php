<?php

$host = "localhost";
$user = "root";
$pass = "";
$db_name = "midterm-date-picker";

$conn = mysqli_connect($host, $user, $pass) or die("Sorry, we couldn't connect to MYSQL");
mysqli_select_db($conn, $db_name) or die ("Sorry, we couldn't find the database");


?>