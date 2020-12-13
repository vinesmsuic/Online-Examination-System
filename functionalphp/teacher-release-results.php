<?php
    include "mysql-connect.php";

    $course = $_POST['releaseCourse'];
    $courseNum = intval($_POST['releaseCourseNum']);
    $graded = intval(1);

    $stmt = $connect->prepare("UPDATE exams SET graded = ? WHERE course = ? AND examNum = ?");
    $stmt->bind_param("isi",$graded,$course,$courseNum);

    $valid = $stmt->execute();
    if (!$valid){
        die("Could not successfully run query.". $connect->connect_error);
    }

    //Successful
    $alert_message = "Successfully Released the Grades.";
    $link = "../page/teacher-checkandgrade-exam.php";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";

?>    