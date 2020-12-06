<?php
		include "mysql-connect.php";
		
        $ID = $_GET['enterID'];
        $PW = $_GET['password'];
        $Query = "SELECT PW, userType FROM users WHERE ID = '$ID'";
	    $Result = mysqli_query($connect, $Query);
	    if (!$Result){
	    	die("Could not successfully run query.". mysqli_error($connect));
        }
	    if (mysqli_num_rows($Result)==0){
            //display message of no such student/teacher/admin
	    	echo "Failed to find an account with the input ID.";
	    } else {
            $row = mysqli_fetch_assoc($Result);
            if ($PW == $row['PW']) {
                $type = $row['userType'];
                //save data, record cookie for 24hours
                setcookie($ID, $type, time() + 1);
                //login success
                echo "success";
            } else {
                //display message of password error
                echo "The input password does not match the account password.";
            }
        }
        mysqli_close($connect);
?>