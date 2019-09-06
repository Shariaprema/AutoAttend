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

<?php require('layout/header.php'); ?>

<form action="create_device.php" method="POST">
	<div class="form-group row">
    <label for="field_name" class="col-sm-2 col-form-label"> Device Name</label>
    <div class="col-sm-10">
      <input name="name" type="n" class="form-control" id="field_name" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="field_mac_address" class="col-sm-2 col-form-label">Mac Address</label>
    <div class="col-sm-10">
      <input name="mac_address"type="text" class="form-control" id="field_mac_address" placeholder="Mac Address">
    </div>
  </div>
<div class="form-group row">
    <label for="field_user_id" class="col-sm-2 col-form-label">ID</label>
    <div class="col-sm-10">
      <input name="user_id"type="number" class="form-control" id="field_user_id" placeholder="User Id" min="1">
    </div>
  </div>


  <div class="form-group row">
    <div class="offset-sm-2 col-sm-10"><!-- create user button la right a nebr jonno-->
      <button type="submit" class="btn btn-primary">Add Device</button>
    </div>
  </div>
</form>

<?php require('layout/footer.php')?>

