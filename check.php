<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php');?>

<?php
date_default_timezone_set('Asia/Dhaka');

$ip_list = get_ip_lists();


$sql = "SELECT id, name, mac_add, user_id FROM devices";

$result = $conn->query($sql); //database connection

while ($row = $result-> fetch_assoc()) {

	$id 		= $row['id'];//date base theke basce
	$mac_add 	= $row['mac_add'];
	$user_id 	= $row['user_id'];

	$date 		= date("Y-m-d", time());// ami diyece ekhane
	$time 		= date("Y-m-d H:i:s", time());


	$ip    		= array_search ($mac_add, $ip_list); //mac ip 

	if(is_device_online($ip)){

		$conn->query("UPDATE devices SET last_seen = '$date' WHERE id = '$id'");//UPDATE HOSCE

		$result2 = $conn->query("SELECT date FROM attendance WHERE user_id ='$user_id' AND date = '$date' LIMIT 0,1");


		if($result2->num_rows == 0){ //jodi na pay ip
			$conn->query("INSERT INTO attendance(user_id, date, in_time, out_time) VALUES('$user_id','$date', '$time', '$time')"); //entry kora ace
		}
		else{
			$conn->query("UPDATE attendance SET out_time = '$time' WHERE user_id = '$user_id' AND date = '$date'"); //set er moddhe jeta thake seta update hbe
		}

		

    }
	else echo $row['name'] . ': offline <br/>';	
}   
	

