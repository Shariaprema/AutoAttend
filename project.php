<?php 
$username =$_POST['user'];
$password =$_POST['pass'];

//tp prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// connect to the server & select the database
mysql_connect("localhost", "root", "");
mysql_select_db("login");

//query the databasa for user
$result = mysql_query("select * from users where username = '$username'and password = '$password'")
	or die("Faild to query database ".mysql_error());
$row = mysql_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password){
	echo "Login success!!! welcome " .$row['username'];
} else {
	echo "Failed to login!";
}

 ?>

