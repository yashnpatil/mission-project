<?php
	include('connection.php');
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql = "select * from login_tab where email = '$email' and password = '$password' ";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		echo"<script>window.alert('You have successfully Logged in');
		window.location.href='after-login.html';</script>";
	}
	else{
		echo "<script >window.alert('plz enter correct email/password');window.location.href='index.html';</script>";
		header("location:index.html");
		}
?>
<!-- $host = "localhost";
$user = "root";
$password = "";
$db_name = "vehicle_system";

$conn= mysqli_connect($host,$user,$password,$db_name); -->


<!-- // if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }



// if(isset($_POST["email"])&& isset($_POST["password"]) ) 
//        {
// 	$uemail=$_POST['email'];
// 	$password=$_POST['password'];

// 	$sql="select * from login_tab where email='$uemail' AND password='$password' limit 1";
// 	$row= mysqli_query($conn,$sql);
// 	$count = mysqli_num_rows($row);
// 	if ($count == 1) {
		
// 		echo "<script >window.alert('You have successfully Logged in');
// 				window.location.href='after-login.html';</script>";
// 		//header("location:after-login.html");
		
// 	}
// 	else{
// 		echo "<script >window.alert('plz enter correct email/password');window.location.href='index.html';</script>";
// 		//header("location:index.html");
		
// 	}
// }else {
// echo "<p style:'color:red'> problem </p>";
// header("location:index.html");
// }
//chatbot c++

?> -->