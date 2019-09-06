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

elseif (strlen($_POST['name']) < 3) { 
	$errors[] =  'Name is too small';
}

if (empty($_POST['email'])) {  
	$errors[] =  'email is required';
}

elseif (strlen($_POST['email']) < 8) { 
	$errors[] =  'Email is too small ';
}
if(is_admin()){
	if (empty($_POST['role'])) { 
		$errors[] =  'role is required';
	}

elseif (($_POST['role'] != 'user') && ($_POST['role'] != 'admin')) { //empty manei hosce false 
	$errors[] =  'role is invalid';
	}

}

else{
	$_POST['role'] = 'user';
}

foreach ($errors as $error) {
	echo '<li>' . $error . '</li>';
}


if(!empty($errors)){ //empty hle
	echo 'please correct the errors';
	die();
}
$user_id    = (int) $_POST['userID'];

$name 		= addslashes($_POST['name']);
$email 		= addslashes($_POST['email']);
$role 		= $_POST['role'];

$insert = $conn->query(" UPDATE users  SET name = '$name', email = '$email', role='$role' WHERE id= '$user_id'");

if (!$insert) 
	die('database error');

header('location: http://localhost/dashboard/edit_profile.php?success=true');

