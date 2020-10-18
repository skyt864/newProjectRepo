<?php

$siteurl="http://localhost/training/html/mytask/admin/";

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "project";

 //Create connection
$conn = new mysqli( $dbhost, $dbuser,$dbpass,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
// echo "suceess";
