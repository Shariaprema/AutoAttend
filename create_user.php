<?php 
 $page_title = "Add User";
 ?>
<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php
admin_only();
$page_title = "Add User";
?>


<?php 
if ($_SERVER[ 'REQUEST_METHOD'] != 'POST') { //check krbe post method ki na, hle dashboard a pathiye dbe
	header('location: http://localhost/dashboard');
	die();
}

$errors= array();


if (empty($_POST['name'])) { //empty manei hosce false 
	$errors[] = 'Name is required';
}

elseif (strlen($_POST['name']) < 3) { //empty manei hosce false 
	$errors[] =  'Name is too small';
}

if (empty($_POST['email'])) { //empty manei hosce false 
	$errors[] =  'email is required';
}

elseif (strlen($_POST['email']) < 8) { //empty manei hosce false 
	$errors[] =  'Email is too small ';
}

elseif (get_user($_POST['email'])) { //empty manei hosce false 
	$errors[] =  'Email is already being used';
}


if (empty($_POST['password'])) { //empty manei hosce false 
	$errors[] =  'password is required';
}


elseif (strlen($_POST['password']) <4) { //empty manei hosce false 
	$errors[] =  'password is too small';
}

if (empty($_POST['role'])) { //empty manei hosce false 
	$errors[] =  'role is required';
}

elseif (($_POST['role'] != 'user') && ($_POST['role'] != 'admin')) { //empty manei hosce false 
	$errors[] =  'role is invalid';
}

foreach ($errors as $error) {
	echo '<li>' . $error . '</li>';
}


if(!empty($errors)){ //empty hle
	echo 'please correct the errors';
	die();
}

$name 		= addslashes($_POST['name']);
$email 		= $_POST['email'];
$password	= md5($_POST['password']);
$role 		= $_POST['role'];

$insert = $conn->query("INSERT INTO users(name, email, password, role) VALUES('$name','$email', '$password', '$role')");

if (!$insert) 
	die('database error');

header('location: http://localhost/dashboard');

