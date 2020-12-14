<?php
        include "mysql-connect.php";

        date_default_timezone_set("Asia/Hong_Kong");
        $stmt = $connect->prepare("SELECT DISTINCT exams.course as 'course', exams.examNum as 'examNum', examDate, remarks, submitTime, SUM(exam_answers.score) as 'hisScore' FROM exams, exam_answers 
        WHERE graded = 1 and (exams.course = exam_answers.course and exams.examNum = exam_answers.examNum) and studentID = ? ORDER BY examDate DESC, submitTime");
        if (isset($_COOKIE["userID"])){
            $stmt->bind_param("s",$_COOKIE['userID']);
        } else {
            header("Location: ../functionalphp/logout.php");
            $connect->close();
            exit();
        }
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if ($row['course']==""){
            print '<div class="alert alert-warning"><h4>Opps...</h4><strong>Seems that none of your attempted exams have been graded yet.</strong></div>';
        } else {
            print "<h3>Your Graded Exams</h3>";
            print '<table class="table table-striped table-info"><thead><tr><th>Course Code</th><th>Date</th><th>Submitted Time</th><th>Remarks</th><th>Your Marks</th><th>View in Details</th></tr></thead><tbody>';
            do {
                $stmt2 = $connect->prepare("SELECT SUM(score) as 'totalScore' FROM exams, exam_questions 
                WHERE (exams.course = exam_questions.course and exams.examNum = exam_questions.examNum) 
                and exams.course = ? and exams.examNum = ?");
                $stmt2->bind_param("si",$row['course'],$row['examNum']);
                $valid = $stmt2->execute();
                if (!$valid){
                    die("Could not successfully run query.". $connect->connect_error);
                }
                $result2 = $stmt2->get_result();
                $row2 = $result2->fetch_assoc();
                print "<tr><td>";
                print $row['course'] . "</td><td>";
                print $row['examDate'] . "</td><td>";
                print $row['submitTime'] . "</td><td>";
                if (strlen($row['remarks'])==0) {
                    print " - </td><td>";
                } else {
                    print $row['remarks'] . "</td><td>";
                }
                print $row['hisScore'] . "/" . $row2['totalScore'] . "</td><td>";
                print "<a class='btn btn-primary' onclick='ChooseExam(\"".$row['course']."\",".$row['examNum'].");'><i class='fas fa-eye'></i></a></td></tr>";
            } while ($row = $result->fetch_assoc());
            print '</tbody></table>';
        }
	    
        $connect->close();
?>
