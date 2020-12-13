<?php
    include "mysql-connect.php";

    $course = $_POST['targetCourse'];
    $courseNum = intval($_POST['targetCourseNum']);
    $studentID = $_POST['targetstudentID'];

    $stmt1 = $connect->prepare("SELECT QID, answer FROM exam_answers WHERE course = ? AND examNum = ? AND studentID = ?");
    $stmt1->bind_param("sis",$course,$courseNum,$studentID);
    
    $valid = $stmt1->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }

    $result1 = $stmt1->get_result();
    
    print '<h3>Grading: Student '.$studentID.' </h3>';

    while ($row = $result1->fetch_assoc()) {
        $QID = $row['QID'];
        $studentAns = $row['answer'];

        $stmt2 = $connect->prepare("SELECT QType, score, question, answer, mc1, mc2, mc3, mc4 FROM exam_questions WHERE course = ? AND examNum = ? AND QID = ?");
        $stmt2->bind_param("sii",$course,$courseNum,$QID);
        $valid = $stmt2->execute();
        if (!$valid){
            die("Could not successfully run query.". $connect->connect_error);
        }
        $result2 = $stmt2->get_result();
        
        $inside_row = $result2->fetch_assoc();

        //Get stmt2 infos
        $questionType = $inside_row['QType'];
        $maxScore = $inside_row['score'];
        $questionText = $inside_row['question'];
        

        if($questionType == 1 || $questionType == 2)
        {
            //Automatically giving Score for MCQ and TFQ
            $correctAns = $inside_row['answer'];
            if($studentAns == $correctAns)
            {
                $studentScore = $maxScore;
            }
            else
            {
                $studentScore = 0;
            }

            if($questionType == 1)
            {
                $mc1 = $inside_row['mc1'];
                $mc2 = $inside_row['mc2'];
                $mc3 = $inside_row['mc3'];
                $mc4 = $inside_row['mc4'];

                switch($studentAns)
                {
                    case 1:
                        $studentAns = $mc1;
                        break; 
                    case 2:
                        $studentAns = $mc2;
                        break;   
                    case 3:
                        $studentAns = $mc3;
                        break; 
                    case 4:
                        $studentAns = $mc4;
                        break;                           
                }
            }
            else if($questionType == 2)
            {
                switch($studentAns)
                {
                    case 1:
                        $studentAns = "True";
                        break; 
                    case 0:
                        $studentAns = "False";
                        break;                          
                }
            }

            echo "<div class='container-fluid p-3 bg-white border question".$QID."'> 
            <h5>Question ".$QID." (".$maxScore." marks)</h5> <div class='form-group'> 
            <label>Question:</label> <div class='container'>".$questionText."</div> 
            </div> <div class='form-group'> 
            <label>Student's Answer:</label> <div class='container'>".$studentAns."</div> </div> 
            <div class='form-group'> <label>Score Given</label> 
            <input type='number' class='form-control col-xs-1 container' placeholder='' id='question".$QID."-marked-score' name='question".$QID."-marked-score' value='".$studentScore."' readonly /> </div> 
            </div><br>";
            
        }
        else if ($questionType == 3 || $questionType == 4)
        {
            echo "<div class='container-fluid p-3 bg-white border question".$QID."'> 
            <h5>Question ".$QID." (".$maxScore." marks)</h5> <div class='form-group'> 
            <label>Question:</label> <div class='container'>".$questionText."</div> 
            </div> <div class='form-group'> 
            <label>Student's Answer:</label> <div class='container'>".$studentAns."</div> </div> 
            <div class='form-group'> <label>Score Given</label> 
            <input type='number' class='form-control col-xs-1 container' placeholder='' id='question".$QID."-marked-score' name='question".$QID."-marked-score' min='0' max='".$maxScore."' required /> </div> 
            </div><br>";

        }
    }

    
    echo "<input type='hidden' id='targetCourse' name='targetCourse' value='".$course."' />";
    echo "<input type='hidden' id='targetCourseNum' name='targetCourseNum' value='".$courseNum."' />";
    echo "<input type='hidden' id='targetstudentID' name='targetstudentID' value='".$studentID."' />";
    echo "<input type='hidden' id='qTotal' name='qTotal' value='".$QID."' />";
    $connect->close();

?>

