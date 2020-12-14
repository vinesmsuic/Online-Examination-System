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
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th>";
        //print "<th></th><th></th>";
        print"</tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/client/" . $row['profileImage'] . "' alt='' class='profileimage' /></td>";
            //Modifying and deleting admin account is possible, but it seems weird for an admin to be able to modify another admin
            //So we disabled it for now, the follow two button allows it
            /*print "<td><a class='btn btn-info' onclick='btnModify(\"".$row['ID']."\");'><i class='far fa-edit'></i></a></td><td>";
            print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['ID']."\");'><i class='far fa-trash-alt'></i></a></td>";*/
            print "</tr>";
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
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th><th>Course</th><th></th><th></th></tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/client/" . $row['profileImage'] . "' alt='' class='profileimage' /> </td><td>";
            print $row['course'] . "</td><td>";
            print "<a class='btn btn-info' onclick='btnModify(\"".$row['ID']."\");'><i class='far fa-edit'></i></a></td><td>";
            print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['ID']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
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
        print "<tr><th>ID</th><th>Password</th><th>Nickname</th><th>Email</th><th>Profile Image</th><th>Gender</th><th>Birthday</th><th></th><th></th></tr>";
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['ID'] . "</td><td>";
            print $row['PW'] . "</td><td>";
            print $row['nickName'] . "</td><td>";
            print $row['email'] . "</td><td>";
            print "<img src='../img/client/" . $row['profileImage'] . "' alt='' class='profileimage' /> </td><td>";
            print $row['gender'] . "</td><td>";
            print $row['birthday'] . "</td><td>";
            print "<a class='btn btn-info' onclick='btnModify(\"".$row['ID']."\");'><i class='far fa-edit'></i></a></td><td>";
            print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['ID']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
        }
        
        print "</table>";
        print "<div class='line'></div>";

        //--------------------------------Get Examination Info

        $stmt = $connect->prepare("SELECT * FROM exams ORDER BY course, examNum");
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        print "<h3>Current Exams</h3>";
        print '<table class="table table-striped table-primary">';
        print '<tr><th>Course Code</th><th>Exam Number</th><th>Exam Date</th><th>Start Time</th><th>Expire Time</th><th>Creator</th><th>Remarks</th><th>Status</th></tr>';
        while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['course'] . "</td><td>";
            print $row['examNum'] . "</td><td>";
            print $row['examDate'] . "</td><td>";
            print $row['startTime'] ."</td><td>";
            print $row['expireTime'] . "</td><td>";
            print $row['creator'] . "</td><td>";
            if (strlen($row['remarks'])==0) {
                print " - </td><td>";
            } else {
                print $row['remarks'] . "</td><td>";
            }
            if ($row['graded']==0) {
                print "Not Published</td>";
            } else {
                print "Published</td>";
            }
            print "</tr>";
        }
        print '</table>';
        print "<div class='line'></div>";



        $connect->close();
?>
