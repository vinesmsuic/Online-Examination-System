<?php
		include "mysql-connect.php";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["userID"])){
            $ID = $_SESSION["userID"];
            $stmt = $connect->prepare("SELECT course FROM users WHERE ID = ?");
            $stmt->bind_param("s",$ID);
            $valid = $stmt->execute();
	        if (!$valid){
	        	die("Could not successfully run query.". $connect->connect_error);
            }
            $result = $stmt->get_result();
	        if ($result->num_rows==0){
	        	echo "Account error.";
	        } else {
                $row = $result->fetch_assoc();
                echo $row['course'];
            }
            $connect->close();
        } else {
            echo "Account error.";
        }

        
?>