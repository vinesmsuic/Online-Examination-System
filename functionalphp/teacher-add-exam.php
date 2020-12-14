<?php
		include "mysql-connect.php";
        
        $creator = $_POST['creator'];
        $course = $_POST['course-name'];
        $stmt = $connect->prepare("SELECT COALESCE(MAX(examNum), 0) as 'NextNum' FROM exams WHERE course = ?");
        $stmt->bind_param("s",$course);
        $valid = $stmt->execute();
        if (!$valid){
	    	die("Could not successfully run query.1". $connect->connect_error);
        }
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $examNum = $row['NextNum']+1;
        $examDate = $_POST['exam-date'];
        $startTime = $_POST['start-time'];
        $expireTime = $_POST['end-time'];
        if (strlen($_POST['exam-remarks'])==0) {
            $remarks = NULL;
        } else {
            $remarks = $_POST['exam-remarks'];
        }
        $notGraded = 0;
        $stmt2 = $connect->prepare("INSERT into exams (course, examNum, examDate, startTime, expireTime, creator, graded, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->bind_param("sissssis",$course,$examNum,$examDate,$startTime,$expireTime,$creator,$notGraded,$remarks);
        $valid = $stmt2->execute();
        if (!$valid){
            die("Could not successfully run query.2". $connect->connect_error);
        }
        /*
        $databaseName = "`".$course."_".$examNum."`";
        $stmt3 = $connect->prepare("CREATE TABLE $databaseName (course varchar(64) NOT NULL, examNum INT NOT NULL, QID INT NOT NULL, QType INT NOT NULL, score DOUBLE(4,2) NOT NULL, question varchar(512) NOT NULL, answer INT, mc1 varchar(64), mc2 varchar(64), mc3 varchar(64), mc4 varchar(64), percent double(4,2), average double(4,2), PRIMARY KEY (course, examNum, QID))");
        $valid = $stmt3->execute();
        if (!$valid){
            die("Could not successfully run query.3". $connect->connect_error);
        }*/
        $questionNum = intval($_POST['question-number']);
        $stmt4 = $connect->prepare("INSERT INTO exam_questions (course, examNum, QID, QType, score, question, answer, mc1, mc2, mc3, mc4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        for ($i = 1; $i <= $questionNum; $i++){
            $QType = intval($_POST['question'.$i.'-type']);
            $score = floatval($_POST['question'.$i.'-score']);
            $question = $_POST['question'.$i.'-q'];
            if (intval($_POST['question'.$i.'-type'])==1){
                $mc1 = $_POST['question'.$i.'-mc-choice1'];
                $mc2 = $_POST['question'.$i.'-mc-choice2'];
                $mc3 = $_POST['question'.$i.'-mc-choice3'];
                $mc4 = $_POST['question'.$i.'-mc-choice4'];
                $answer = intval($_POST['question'.$i.'-mcq-correct']);
            } else {
                $mc1 = NULL;
                $mc2 = NULL;
                $mc3 = NULL;
                $mc4 = NULL;
                if (intval($_POST['question'.$i.'-type'])==2){
                    $answer = intval($_POST['question'.$i.'-tfq-correct']);
                } else {
                    $answer = NULL;
                }
            }
            $stmt4->bind_param("siiidsissss",$course,$examNum,$i,$QType,$score,$question,$answer,$mc1,$mc2,$mc3,$mc4);
            $valid = $stmt4->execute();
            if (!$valid){
                die("Could not successfully run query.4". $connect->connect_error);
            }
        }
        $alert_message = "Exam Posted Successfully! You will be redirected in a few seconds.";
        $link = "../page/teacher-view-exam.php";
        echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
        $connect->close();
?>