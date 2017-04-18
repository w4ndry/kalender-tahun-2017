<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db 	= "kalender";

	$conn = new mysqli($host, $user, $pass, $db);

	if($conn->connect_errno){
		echo 'Error!' .$conn->connect_error;
	}	
?>