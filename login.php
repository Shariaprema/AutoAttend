<?php 

require('inc/connect.php');

if(isset($_POST ["username"]) && isset($_POST ["password"])){
	$username= $_POST["username"];
	$password= md5($_POST["password"]);	

	//check username & password
	$sql = "SELECT email, password FROM users WHERE email= '$username' AND password ='$password'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		setcookie("user_name", $username, time() + 3600 ,"/dashboard");
		header('location: http://localhost/dashboard/welcome.php');
		exit;
   
	} else { //user not found
		header('location: http://localhost/dashboard?invalid=1');
	
	}
	$conn->close();
} 
	else echo "Invalid Request";
 ?>

  