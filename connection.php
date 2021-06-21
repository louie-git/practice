<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sampledb";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>