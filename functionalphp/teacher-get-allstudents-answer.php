<?php
    include "mysql-connect.php";

    $course = $_POST['targetCourse'];
    $courseExamNum = intval($_POST['targetCourseNum']);

    $stmt = $connect->prepare("SELECT DISTINCT studentID FROM exam_answers WHERE course = ? AND examNum = ? AND score IS NULL");
    $stmt->bind_param("si",$course,$courseExamNum);
    $valid = $stmt->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }

    $result = $stmt->get_result();

    if($result->num_rows == 0)
    {
        print '<h3>All student submissions in this '.$course.' exam have been graded. </h3>';
        print "<button type='button' class='col-md-12 col-lg-12 form-control btn btn-primary btn-lg'onclick='releaseResultsToStudents(`".$course."`,".$courseExamNum.");'>Click here to release the results</button>";
    }
    else
    {
        print '<h3>Grade student submitted answers of '.$course.' exam: </h3>';
        print '<button type="button" class="col-md-12 col-lg-12 form-control btn btn-secondary btn-lg" disabled>Release the results after marking all submissions</button>';
        print '<table class="table table-striped" style="text-align:center">';
        print '<thead><tr><th>Student ID</th><th>Action</th></thead><tbody>';

        while ($row = $result->fetch_assoc()) {
            print "<tr><td>";
            print $row['studentID'] . "</td><td>";
            print "<a class='btn btn-info' onclick='btnGradeForStudent(`".$course."`,".$courseExamNum.",`".$row['studentID']."`);'><i class='fas fa-pen-nib'></i></a></td></tr>";
            //print "<a class='btn btn-danger' onclick='btnDelete(\"".$row['course']."\");'><i class='far fa-trash-alt'></i></a></td></tr>";
        }

        print '</tbody></table>';
    }    

    $connect->close();

?>