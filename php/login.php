<?php
		include "mysql-connect.php";
		$connect = mysqli_connect($server, $user, $pw, $db);
		if(!$connect){
			die("Connection failed: ".mysqli_connect_error());
        }
        $ID = $_GET['enterID'];
        $PW = $_GET['password'];
        $Query = "SELECT PW, userType FROM users WHERE ID = '$ID'";
	    $Result = mysqli_query($connect, $Query);
	    if (!$Result){
	    	die("Could not successfully run query.". mysqli_error($connect));
        }
	    if (mysqli_num_rows($Result)==0){
	    	echo "fail to find account";//display message of no such student/teacher/admin
	    } else {
            $row = mysqli_fetch_assoc($Result);
            if ($PW == $row['PW']) {
                $type = $row['userType'];
                setcookie($ID, $type, time() + 1);//save data, record cookie for 24hours
                echo "success";//login success
            } else {
                echo "password not matching";//display message of password error
            }
        }
        mysqli_close($connect);
?>