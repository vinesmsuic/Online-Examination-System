<?php
        include "mysql-connect.php";
        $stmt = $connect->prepare("SELECT * FROM users WHERE userType = 'admin'");
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
	    while ($row = $result->fetch_assoc()) {
            
        }
        $connect->close();
?>
