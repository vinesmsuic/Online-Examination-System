<?php
    include "mysql-connect.php";

    $course = $_POST['targetCourse'];
    $courseNum = intval($_POST['targetCourseNum']);
    $studentID = $_POST['targetstudentID'];
    $qTotal = $_POST['qTotal'];

    //Updating Marked Score to Database Server
    for ($i = 1; $i <= $qTotal; $i++)
    {
        $original = "question1-marked-score";
        $replacing = "/1/i";
        $replaced = preg_replace($replacing, $i, $original);

        $score = $_POST[$replaced];
        $stmt = $connect->prepare("UPDATE exam_answers SET score = ? WHERE course = ? AND examNum = ? AND studentID = ? AND QID = ?");
        $stmt->bind_param("isisi",$score,$course,$courseNum,$studentID,$i);

        $valid = $stmt->execute();
        if (!$valid){
            die("Could not successfully run query.". $connect->connect_error);
        }
        
    }

    //Successful
    $alert_message = "Successfully Updated the Server.";
    $link = "../page/teacher-view-exam.php";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";

?>