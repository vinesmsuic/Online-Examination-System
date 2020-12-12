<?php
		include "mysql-connect.php";
		
        $questionNum = intval($_POST['question-number']);
        $course = $_POST['course-name'];
        for ($i = 1; $i <= $questionNum; $i++){
            
        }
        $stmt = $connect->prepare("SELECT examNum FROM courses WHERE course = ?");
        $stmt->bind_param("s",$course);
        $valid = $stmt->execute();
        if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
	    if ($result->num_rows==0){
            $stmt2 = $connect->prepare("INSERT into courses (course, examNum) VALUES (?, ?)");
            $examNum = 1;
            $stmt2->bind_param("si",$course,$examNum);
            $valid = $stmt2->execute();
            if (!$valid){
                die("Could not successfully run query.". $connect->connect_error);
            }
	    } else {
            $row = $result->fetch_assoc();
            $examNum = $row['examNum'];
            $stmt2 = $connect->prepare("UPDATE courses SET examNum = ? WHERE course = ?");
            $stmt2->bind_param("is",$examNum+1,$course);
            $valid = $stmt2->execute();


        $stmt = $connect->prepare("CREATE TABLE [course+"_"+examno.] (
            ID int PRIMARY KEY IDENTITY(1,1),
            course varchar(64) NOT NULL,
            QType varchar(64) NOT NULL,
            score double(4) NOT NULL,
            question varchar(200) NOT NULL,
            answer varchar(200) NOT NULL,
            mcOptions varchar(64)
           )");
        $valid = $stmt->execute();
        if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
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
                //save data, record cookie for 24hours
                setcookie("type", $type, time() + 60);
                setcookie("userID", $ID, time() + 60);//save data, record cookie for 24hours
                //login success
                echo $type;

            } else {
                //display message of password error
                echo "The input password does not match the account password.";
            }
        }
        $connect->close();
?>