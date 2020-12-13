<?php
    include "mysql-connect.php";

    if (isset($_COOKIE["userID"])){
        $userID = $_COOKIE["userID"];

        $stmt = $connect->prepare("SELECT course, examNum, examDate, startTime, expireTime, remarks FROM exams WHERE creator = ?");
        $stmt->bind_param("s",$userID);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

	    print '<table class="table table-striped" style="text-align:center">';
        print '<thead><tr><th>Course Code</th><th>Exam Time</th><th>Date</th><th>Remarks</th><th>Action</th></tr></thead><tbody>';
                                 
                              
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['course'] . "</td><td>";
            print $row['startTime'] ."-". $row['expireTime'] . "</td><td>";
            print $row['examDate'] . "</td><td>";
            if (strlen($row['remarks'])==0) {
                print " - </td><td>";
            } else {
                print $row['remarks'] . "</td><td>";
            }
            print "<a class='btn btn-info' onclick='btnGradeForAllStudents(`".$row['course']."`,".$row['examNum'].");'><i class='fas fa-pen-nib'></i></a></td></tr>";
            //print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['course']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
        }

        print '</tbody></table>';

        $connect->close();
    }
?>