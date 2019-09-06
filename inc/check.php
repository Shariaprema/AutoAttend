<?php

date_default_timezone_set('Asia/Dhaka');

$client_list_file = 'clients.txt';

if (!file_exists($client_list_file)) {
	file_put_contents($client_list_file, "Name	MAC");	
}

$client_list = file_get_contents($client_list_file);//c_l ta c_l_f er moddhe store krbe

$client_list = explode("\n", $client_list );//line break //\n delimiter //192.168.0.107 "/n" break
$client_list_heading = explode("	", $client_list[0] );  // "" separation er jonno //name & mac

unset($client_list[0]);

$clients = array(); 

foreach ($client_list as $client) { // as value
	$client = explode("	", $client);
	$name = $client [0];
	$mac =  preg_replace('/\s*/m',' ', $client[1]);
	$clients[$name] = $mac; 
}
 //get the ip address
ob_start();
		system('arp -a');
		$cmd_result = ob_get_contents();
ob_clean();

$ip_list = explode("\n", $cmd_result); //create array for each entry

unset($ip_list[0], $ip_list[1], $ip_list[2]); //remove unecessary values 

//process each entry
foreach ($ip_list as $value) {
	//remove extra blank space & expload by single space
 	$value = explode(" ", preg_replace('/\s+/', ' ', trim($value))); //check if the explod entry  has a mac address

 	if (isset($value[1])){
 		$mac = strtoupper($value[1]);// Uppercase all mac address
		$ip_list_new[$ip] = $mac;
 	} 		
 	
}
var_dump($clients);
//ping each clint
foreach ($clients as $name => $mac) { //=> key

	$ip = array_search($mac, $ip_list_new);

	ob_start();
		system('ping -n 1 ' . $ip);
		$cmd_result = ob_get_contents();
	ob_clean();

	if (strpos($cmd_result, 'Received = 1') != FALSE){
		$clients[$name] = 'Online';
	}
	else {
		$clients[$name] = 'Offline';
	}
}
var_dump($clients);

 ?>