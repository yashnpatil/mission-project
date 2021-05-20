<?php
    session_start();
    //include connection file
    include('connection.php');
    $errors=array();
    if (isset($_POST['submit'])) {
		// receive all input values from the form
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['conform_password'];
		$mobile_number = $_POST['mobile_number'];
		$vehicle_type = $_POST['vehicle_type'];
		$vehicle_number = $_POST['vehicle_number'];
		$document_upload = $_POST['document_upload'];
		$res = mysqli_query("select * from registration_tab where email = '$email' and mobile_number = '$mobile_number' limit 1");
			$count=mysqli_num_rows($res);
	}	
    
?>