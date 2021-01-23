<?php
		include "mysql-connect.php";
        
        //get Info from login.html
        $ID = $_GET['enterID'];
        $PW = $_GET['password'];
        $stmt = $connect->prepare("SELECT PW, userType, nickName FROM users WHERE ID = ?");
        $stmt->bind_param("s",$ID);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
	    if ($result->num_rows==0){
            //display message of no such student/teacher/admin
	    	echo "Failed to find an account with the input ID.";
	    } else {
            $row = $result->fetch_assoc();
            if ($PW == $row['PW']) {
                $type = $row['userType'];
                $nick = $row['nickName'];
                //save data
		$_SESSION["type"]=$type;
		$_SESSION["userID"]=$ID;
		$_SESSION["nickName"]=$nick;
                //login success - Request.responseText to checklogin.js
                echo $type;

            } else {
                //display message of password error
                echo "The input password does not match the account password.";
            }
        }
        $connect->close();
?>
