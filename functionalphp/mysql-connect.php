<?php
	$server = "localhost";
	$user = "systemadmin";
	$pw = "university";
    $db = "examsystem";
    
    $connect = new mysqli($server, $user, $pw, $db);
	if($connect->connect_error){
		die("Connection failed: ".$connect->connect_error;
    }
?>