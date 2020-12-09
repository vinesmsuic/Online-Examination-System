<?php
        include "mysql-connect.php";

        //--------------------------------Get Admin Accounts

        $stmt = $connect->prepare("SELECT * FROM users WHERE userType = 'admin'");
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        print "<h3>Admin Accounts</h3>";
        print "<table class='table table-striped table-danger'>";
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th></tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/" . $row['profileImage'] . "' alt='' style='width:auto; max-height:35px;' /> </td></tr>";
        }
        print "</table>";
        print "<div class='line'></div>";

        //--------------------------------Get Teacher Accounts

        $stmt = $connect->prepare("SELECT * FROM users WHERE userType = 'teacher'");
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        print "<h3>Teacher Accounts</h3>";
        print "<table class='table table-striped table-info'>";
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th><th>Course</th></tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/" . $row['profileImage'] . "' alt='' style='width:auto; max-height:35px;' /> </td><td>";
            print $row['course'] . "</td></tr>";
        }
        print "</table>";
        print "<div class='line'></div>";

        //--------------------------------Get Student Accounts

        $stmt = $connect->prepare("SELECT * FROM users WHERE userType = 'student'");
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        print "<h3>Student Accounts</h3>";
        print "<table class='table table-striped table-warning'>";
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th><th>Gender</th><th>Birthday</th></tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/" . $row['profileImage'] . "' alt='' style='width:auto; max-height:35px;' /> </td><td>";
            print $row['gender'] . "</td><td>";
            print $row['birthday'] . "</td></tr>";
        }
        print "</table>";
        print "<div class='line'></div>";

        $connect->close();
?>
