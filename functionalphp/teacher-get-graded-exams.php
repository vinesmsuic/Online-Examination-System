<?php
    include "mysql-connect.php";

    if (isset($_COOKIE["userID"])){
        $userID = $_COOKIE["userID"];
        $graded = intval(1);

        $stmt = $connect->prepare("SELECT course, examNum, examDate, startTime, expireTime, remarks FROM exams WHERE creator = ? AND graded = ?");
        $stmt->bind_param("si",$userID, $graded);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        if($result->num_rows == 0)
        {
            print '<div class="alert alert-warning"><h4>Opps...</h4><strong>Seems that you have not yet published any exam yet.</strong></div>';
        }
        else
        {
            print '<h3>View Graded Exams</h3>';
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
                print "<a class='btn btn-primary' onclick='btnViewGradesForAllStudents(`".$row['course']."`,".$row['examNum'].");'><i class='fas fa-eye'></i></a>";
                print "<a class='btn btn-info' onclick='btnViewStatistics(`".$row['course']."`,".$row['examNum'].");'><i class='fas fa-poll'></i></a></td></tr>";
                //print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['course']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
            }

            print '</tbody></table>';
        }

	    

        $connect->close();
    }
?>