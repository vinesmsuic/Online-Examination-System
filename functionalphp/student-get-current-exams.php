<?php
        include "mysql-connect.php";

        date_default_timezone_set("Asia/Hong_Kong");
        $date = date("Y-m-d");
        $time = date("H:i");
        $stmt = $connect->prepare("SELECT course, examNum, examDate, startTime, expireTime, remarks FROM exams WHERE examDate = ? and startTime <= ? and expireTime >= ? ORDER BY startTime");
        $stmt->bind_param("sss",$date,$time,$time);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();
        if ($result->num_rows==0){
            print '<div class="alert alert-warning"><h4>Opps...</h4><strong>Seems that there is no exam now.</strong></div>';
        } else {
            print "<h3>Current Exams</h3>";
            print '<table class="table table-striped table-danger"><thead><tr><th>Course Code</th><th>Exam Time</th><th>Date</th><th>Remarks</th><th>Enter Exam</th></tr></thead><tbody>';
            while ($row = $result->fetch_assoc()) {
                print "<tr><td>";
                print $row['course'] . "</td><td>";
                print $row['startTime'] ."-". $row['expireTime'] . "</td><td>";
                print $row['examDate'] . "</td><td>";
                if (strlen($row['remarks'])==0) {
                    print " - </td><td></tr>";
                } else {
                    print $row['remarks'] . "</td><td>";
                }
                print "<a class='btn btn-info' onclick='ChooseExam(\"".$row['course']."\",".$row['examNum'].");'><i class='fas fa-pen'></i></a></td></tr>";
            }
            print '</tbody></table>';
        }
	    
        $connect->close();
?>
