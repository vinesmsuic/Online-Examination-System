<?php
		include "mysql-connect.php";
		
        $ID = $_GET['enterID'];
        $stmt = $connect->prepare("SELECT ID FROM users WHERE ID = ?");
        $stmt->bind_param("s",$ID);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
	    if ($result->num_rows==0){
            //display message of no such student/teacher/admin
	    	echo "Accepted";
	    } else {
            echo "An account with the entered login ID has already been created. Please change your login ID.";
        }
        $connect->close();
?>