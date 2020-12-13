<?php
    include "mysql-connect.php";

    $course = $_POST['targetCourse'];
    $courseExamNum = intval($_POST['targetCourseNum']);

    $stmt = $connect->prepare("SELECT DISTINCT studentID FROM exam_answers WHERE course = ? AND examNum = ?");
    $stmt->bind_param("si",$course,$courseExamNum);
    $valid = $stmt->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }

    $result = $stmt->get_result();

    if($result->num_rows == 0)
    {

    }
    else
    {
        print '<h3>View graded students of '.$course.' exam: </h3>';
        print '<table class="table table-striped" style="text-align:center">';
        print '<thead><tr><th>Student ID</th><th>Action</th></thead><tbody>';

        while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['studentID'] . "</td><td>";
            print "<a class='btn btn-primary' onclick='btnViewGradeForStudent(`".$course."`,".$courseExamNum.",`".$row['studentID']."`);'><i class='fas fa-eye'></i></a></td></tr>";
            //print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['course']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
        }

        print '</tbody></table>';
    }    

    $connect->close();

?>