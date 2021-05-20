<?php

require('vehicle.php');
$db_name= $con; // assign  your connection varibale

// by default, error messages are empty
$login=$emailErr=$passErr='';
  
 extract($_POST);
if(isset($_POST['submit']))
{
   
   //input fields are Validated with regular expression
   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   
 
//Email Address Validation
if(empty($email
)){
  $emailErr="Email is Required"; 
}
else if (!preg_match($validEmail,$email)) {
  $emailErr="Invalid Email Address";
}
else{
  $emailErr=true;
}
    
// password validation 
if(empty($password)){
  $passErr="Password is Required"; 
} 
else{
   $passErr=true;
}

// check all fields are valid or not
if( $emailErr==1 && $passErr==1)
{
 
   //legal input values
   $email=     legal_input($email);
   $password=  legal_input(md5($password));
   
   // call login function
   $login=login($email,$password);

}

}

// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

// function to insert user data into database table
function login($email,$password){

  global $db;

   // checking valid email
  $sql="SELECT email FROM users WHERE email= ?";
  $query = $db->prepare($sql);
  $query->bind_param('s',$email); 
  $query->execute();
  $exec=$query->get_result();
  if($exec)
  {
  if($exec->num_rows>0){

    // checking email and password
    $loginSql="SELECT email, password FROM users WHERE email=? AND password=?";
    $loginQuery = $db->prepare($loginSql);
    $loginQuery->bind_param('ss',$email, $password); 
    $loginQuery->execute();
    $execQuery=$loginQuery->get_result();
    if($execQuery)
    {
    if($execQuery->num_rows>0){

      session_start();
      $_SESSION['email']=$email;
      header("location:dashboard.php");
    }else{
      return "Your Password is wrong";
    }

  }else{
  return $db->error;
  }


  }
  else
  {
    return $email." is not registered";
  }
}else{
  return $db->error;
}
    
    
}
?>

<!-- preg_match()
The preg_match() function searches string for pattern, returning true if pattern exists, and false otherwise.

preg_match_all()
The preg_match_all() function matches all occurrences of pattern in string.

3   preg_replace()
The preg_replace() function operates just like ereg_replace(), except that regular expressions can be used in the pattern and replacement input parameters.

4   preg_split()
The preg_split() function operates exactly like split(), except that regular expressions are accepted as input parameters for pattern.

5   preg_grep()
The preg_grep() function searches all elements of input_array, returning all elements matching the regexp pattern.

6   preg_ quote()
Quote regular expression characters

The PHP provides $_GET associative array to access all the sent information using GET method.
The POST method transfers information via HTTP headers. The information is encoded as described in case of GET method and put into a header called QUERY_STRING.
The PHP provides $_POST associative array to access all the sent information using POST method.
The PHP $_REQUEST variable can be used to get the result from form data sent with both the GET and POST methods. -->

