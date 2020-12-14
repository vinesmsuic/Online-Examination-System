<?php
		include "mysql-connect.php";
		
        $ID = $_GET['enterID'];
        $stmt = $connect->prepare("SELECT SQType, SQAnswer FROM users WHERE ID = ?");
        $stmt->bind_param("s",$ID);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
	    if ($result->num_rows==0){
            //display message of no such student/teacher/admin
	    	echo "No such account";
	    } else {
            $row = $result->fetch_assoc();
            print(json_encode($row));
        }
        $connect->close();
?>