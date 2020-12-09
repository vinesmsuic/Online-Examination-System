<?php
		include "mysql-connect.php";
		
        $ID = $_GET['enterID'];
        $connect->prepare("SELECT ID FROM users WHERE ID = ?");
        $connect->bind_param("s",$ID);
        $valid = $connect->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $connect->get_result();
	    if ($result->num_rows==0){
            //display message of no such student/teacher/admin
	    	echo "Accepted";
	    } else {
            echo "An account with the entered login ID has already been created. Please change your login ID.";
        }
        $connect->close();
?>