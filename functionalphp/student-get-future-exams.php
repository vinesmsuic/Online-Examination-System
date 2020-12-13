<?php
        include "mysql-connect.php";
        date_default_timezone_set("Asia/Hong_Kong");
        $date = date("Y-m-d");
        $stmt = $connect->prepare("SELECT course, examDate, startTime, expireTime, remarks FROM exams WHERE examDate >= ? ORDER BY examDate, startTime");
        $stmt->bind_param("s",$date);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }

        $result = $stmt->get_result();

        print '<table class="table table-striped">';
        print '<thead><tr><th>Course Code</th><th>Exam Time</th><th>Date</th><th>Remarks</th></tr></thead><tbody>';
                                 
                              
	    while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['course'] . "</td><td>";
            print $row['startTime'] ."-". $row['expireTime'] . "</td><td>";
            print $row['examDate'] . "</td><td>";
            if (strlen($row['remarks'])==0) {
                print " - </td><td></tr>";
            } else {
                print $row['remarks'] . "</td><td></tr>";
            }
        }

        print '</tbody></table>';
        $connect->close();
?>
