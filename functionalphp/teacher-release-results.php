<?php
    include "mysql-connect.php";
    include "math-functions.php";

    $course = $_POST['releaseCourse'];
    $courseNum = intval($_POST['releaseCourseNum']);
    $graded = intval(1);

    $stmt = $connect->prepare("UPDATE exams SET graded = ? WHERE course = ? AND examNum = ?");
    $stmt->bind_param("isi",$graded,$course,$courseNum);

    $valid = $stmt->execute();
    if (!$valid){
        die("Could not successfully run query.". $connect->connect_error);
    }

    //==========================

    $stmt1 = $connect->prepare("SELECT DISTINCT QID, AVG(score) AS 'avgStudentScore' FROM exam_answers WHERE course = ? AND examNum = ? GROUP BY QID");
    $stmt1->bind_param("si",$course,$courseNum);
    
    $valid = $stmt1->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }

    $result1 = $stmt1->get_result();
    
    while ($row = $result1->fetch_assoc()) {
        $QID = $row['QID'];

        $avgStudentScore = $row['avgStudentScore'];

        //$recordNums = $result1->num_rows;

        $stmt2 = $connect->prepare("SELECT QType, score, question, answer, mc1, mc2, mc3, mc4 FROM exam_questions WHERE course = ? AND examNum = ? AND QID = ?");
        $stmt2->bind_param("sii",$course,$courseNum,$QID);
        $valid = $stmt2->execute();
        if (!$valid){
            die("Could not successfully run query.". $connect->connect_error);
        }
        $result2 = $stmt2->get_result();
        
        $inside_row = $result2->fetch_assoc();

        //Get stmt2 infos
        $maxScore = $inside_row['score'];

        $correctRate = number_format((float)$avgStudentScore/$maxScore * 100, 2, '.', '');
        
        $updateQuestionsExam = $connect->prepare("UPDATE exam_questions SET percent = ? , average = ? WHERE course = ? AND examNum = ? AND QID = ?");
        $updateQuestionsExam->bind_param("ddsii",$correctRate,$avgStudentScore,$course,$courseNum,$QID);
        $valid = $updateQuestionsExam->execute();
        if (!$valid){
            die("Could not successfully run query.". $connect->connect_error);
        }
    }

    //===================================================

    
    $stmt = $connect->prepare("SELECT SUM(score) as 'totalScore' FROM exam_answers  
    WHERE course = ? and examNum = ? GROUP BY studentID ORDER BY SUM(score)");
    $stmt->bind_param("si",$course,$courseNum);
    $valid = $stmt->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }
    $result = $stmt->get_result();
    $scoreArray = array();
    while($scoreRows = $result->fetch_assoc())
    {
        $scoreArray[] = $scoreRows['totalScore'];

        //It's better to not use array_push.The functions just add overhead.
        //array_push($scoreArray, $scoreRows['totalScore']);
    }

    $medianTotalScore = getMedian($scoreArray);

    $averageTotalScore = getAverage($scoreArray);
    
    $maxTotalScore = max($scoreArray);

    $minTotalScore = min($scoreArray);


    $updateExams = $connect->prepare("UPDATE exams SET maxScore = ?, minScore = ?, median = ?, average = ? WHERE course = ? AND examNum = ?");
    $updateExams->bind_param("ddddsi",$maxTotalScore,$minTotalScore,$medianTotalScore,$averageTotalScore,$course,$courseNum);
    $valid = $updateExams->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }
    


    $connect->close();

    //Successful
    $alert_message = "Successfully Released the Grades.";
    $link = "../page/teacher-checkandgrade-exam.php";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";

?>    