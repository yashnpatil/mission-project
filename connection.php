<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "vehicle_system";

$conn= mysqli_connect($host,$user,$password,$db_name);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo"Connected Successfully";
?>