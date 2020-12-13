<?php
		include "mysql-connect.php";
        
        $time=date("H:i");
        $course = $_POST['course'];
        $examNum = $_POST['examNum'];
        $submitter = $_POST['submitter'];
        $NumOfQuestions = intval($_POST['NumOfQuestions']);
        $stmt = $connect->prepare("SELECT answer FROM exam_questions WHERE course = ? and examNum = ? ORDER BY QID");
        $stmt->bind_param("si",$course,$examNum);
        $valid = $stmt->execute();
        if (!$valid){
            die("Could not successfully run query.4". $connect->connect_error);
        }
        $result = $stmt->get_result();
        $stmt2 = $connect->prepare("INSERT INTO exam_answers (course, examNum, studentID, QID, answer, score, submitTime) VALUES (?, ?, ?, ?, ?, ?, ?)");
        for ($i = 1; $i <= $NumOfQuestions; $i++){
            if (intval($_POST['question'.$i.'-type'])!=4){
                $answer = $_POST['question'.$i.'-answer'];
            } else {
                $NumOfAns = Intval($_POST['question'.$i.'-NumOfAns']);
                $answer = $_POST['question'.$i.'-ans1'];
                for ($j = 2; $j <= $NumOfAns; $j++){
                    $answer = $answer."__BREAK__".$_POST['question'.$i.'-ans'.$j];
                }
            }
            $row = $result->fetch_assoc();
            if (intval($_POST['question'.$i.'-type'])>2){
                $score = NULL;
            } else {
                if (intval($_POST['question'.$i.'-answer'])==$row['answer']){
                    $score = intval($_POST['question'.$i.'-score']);
                } else {
                    $score = 0;
                }
            }
            $stmt2->bind_param("sisisds",$course,$examNum,$submitter,$i,$answer,$score,$time);
            $valid = $stmt2->execute();
            if (!$valid){
                die("Could not successfully run query.4". $connect->connect_error);
            }
        }
        if ($_POST['submitType']=="action"){
            $alert_message = "Answer submitted successfully! You will be redirected in a few seconds.";
        } else if ($_POST['submitType']=="timeout"){
            $alert_message = "Times up! Your Answer is submitted automatically! You will be redirected in a few seconds.";
        }
        $link = "../page/student-dashboard.php";
        echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
        $connect->close();
?>