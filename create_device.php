<?php 
 $page_title = "Add User";
 ?>
<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php
admin_only();
$page_title = "Add Device";
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

if (empty($_POST['mac_address'])) { //empty manei hosce false 
	$errors[] =  'Mac address is required';
}

elseif (strlen($_POST['mac_address']) != 17) { //empty manei hosce false 
	$errors[] =  'Mac address invalid ';
}

if (empty($_POST['user_id'])) { //empty manei hosce false 
	$errors[] =  'User ID is required';
}


elseif ($_POST['user_id'] <1) { //empty manei hosce false 
	$errors[] =  'User ID is invalid.';
}

elseif(!get_user_by_id($_POST['user_id'])){
$errors[] = 'User ID is invalid.';
}




foreach ($errors as $error) {
	echo '<li>' . $error . '</li>';
}

if(!empty($errors)){ //empty hle
	echo 'please correct the errors';
	die();
}

$name 				= addslashes($_POST['name']);
$mac_add 			= $_POST['mac_address'];
$user_id			= $_POST['user_id'];

$insert = $conn->query("INSERT INTO devices(name, mac_add, user_id) VALUES('$name','$mac_add', '$user_id')");

if (!$insert) 
	die('database error');

header('location: http://localhost/dashboard');

