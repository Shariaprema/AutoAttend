<?php 
 $page_title = "Add User";
 ?>
<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php

$page_title = "Edit Profile";
?>

<?php require('layout/header.php'); ?>

<?php 
	$error = false;

if(!isset($_GET['user_id'])){

$user = current_user();
 }
 else{
 	$user_id = (int) $_GET['user_id'];

	if(get_user_by_id($user_id)){
		$user = get_user_by_id($user_id);
	}

	else {
		$error = true;
	}
}

 ?>
 <?php if (isset ($_GET['success'])): //paraeter ta ace ki na seta check krtece ether echo  
 	echo '<div class="alert alert-success" role="alert">User Upadte</div>';
 endif;
 	?>

 <?php if(!$error):?> 
<form action="update_profile.php" method="POST">

	<input type= "hidden" name="userID" value ="<?= $user->id;?>"> 

	<div class="form-group row">
    <label for="field_name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input name="name" type="n" class="form-control" id="field_name" placeholder="Name" 
      value ="<?= $user->name;?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="field_email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input name="email"type="email" class="form-control" id="field_email" placeholder="Email"  value ="<?= $user->email;?>">
    </div>
  </div>
   <?php if(is_admin()):?>
  
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Role</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="gridRadios1" value="user" <?php if ($user->role == 'admin') echo 'checked'?>>
          <label class="form-check-label" for="gridRadios1">
            User
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="role" id="field_role_admin" value="admin"<?php if ($user->role == 'admin') echo 'checked'?>>
          <label class="form-check-label" for="field_role_admin">
         Admin
          </label>
        </div>
      </div>
    </div>
  </fieldset>
<?php endif;?>
  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10"><!-- create user button la right a nebr jonno-->
      <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
  </div>
</form>
<?php

else:

	echo "Invalid User";

 endif; ?>

<?php require('layout/footer.php'); ?>
