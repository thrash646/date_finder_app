<?php

$host = "localhost";
$user = "nuye0003";
$pass = "40844366";
$db_name = "nuye0003";

$conn = mysqli_connect($host, $user, $pass) or die("Sorry, we couldn't connect to MYSQL");
mysqli_select_db($conn, $db_name) or die ("Sorry, we couldn't find the database");


?>