<?php
	$server = "localhost";
	$user = "systemadmin";
	$pw = "university";
    $db = "examsystem";
    
    $connect = mysqli_connect($server, $user, $pw, $db);
		if(!$connect){
			die("Connection failed: ".mysqli_connect_error());
        }
?>