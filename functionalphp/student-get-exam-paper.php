<?php
    include "../functionalphp/mysql-connect.php";
    
    $course = $_POST['course'];
    $examNum = intval($_POST['examNum']);
    if (ISSET($_COOKIE['userID'])) { 
        print '<input type="hidden" name="submitter" id="submitter" value="'.$_COOKIE['userID'].'" />';
    } else {
        header("Location: ../functionalphp/logout.php");
    }
    $stmt = $connect->prepare("SELECT studentID FROM exam_answers WHERE course = ? AND examNum = ? AND studentID = ?");
    $stmt->bind_param("sis",$course,$examNum, $_COOKIE['userID']);
    $valid = $stmt->execute();
    if (!$valid){
    	die("Could not successfully run query.". $connect->connect_error);
    }
    $result = $stmt->get_result();
    if ($result->num_rows!=0){
        $alert_message = "You have already submitted this exam!";
        $link = "../page/student-dashboard.php";
        echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
    }
    $stmt2 = $connect->prepare("SELECT QID, QType, score, question, mc1, mc2, mc3, mc4 FROM exam_questions WHERE course = ? AND examNum = ? ORDER BY QID");
    $stmt2->bind_param("si",$course,$examNum);
    $valid = $stmt2->execute();
    if (!$valid){
    	die("Could not successfully run query.". $connect->connect_error);
    }
    $result2 = $stmt2->get_result();
    if ($result2->num_rows==0){
    	echo "Exam not found.";
    } else {
        while ($row = $result2->fetch_assoc()) {
            print "<div class ='question".$row['QID']."'>
            <h5 id='question".$row['QID']."'>Question ".$row['QID']."(".$row['score']." marks)</h5>";
            print "<input type='hidden' name='question".$row['QID']."-type' value='".$row['QType']."' />";
            print "<input type='hidden' name='question".$row['QID']."-score' value='".$row['score']."' />";
            if ($row['QType']!=4) {
                print "<div class='form-group'><label>".$row['question']."</label></div>";
                if ($row['QType']==3){
                    print "<div class='form-group'><label>Input your Answer:</label>
                    <textarea class='form-control' name='question".$row['QID']."-answer' rows='3'></textarea></div>";
                } else if ($row['QType']==2){
                    print "<div class='form-group'>
                    <input type='radio' id='question".$row['QID']."-true' name='question".$row['QID']."-answer' value='1' />
                    <label for='question".$row['QID']."-true'>True</label></br>
                    <input type='radio' id='question".$row['QID']."-false' name='question".$row['QID']."-answer' value='0' />
                    <label for='question".$row['QID']."-false'>False</label></div>";
                } else if ($row['QType']==1){
                    print "<div class='form-group'>";
                    for ($i=1; $i<=4; $i++){
                        if (strlen($row['mc'.$i])!=0){
                            $mcID = "question".$row['QID']."-answer";
                            print "<input type='radio' id='".$mcID.$i."' name='".$mcID."' value='".$i."' />";
                            print "<label for='".$mcID.$i."'>".$row['mc'.$i]."</label>";
                            if ($i!=4){
                                print "</br>";
                            }
                        }
                    }
                    print "</div>";
                }
            } else {
                $questionStrings = explode("__BLANK__",$row['question']);
                print "<input type='hidden' name='question".$row['QID']."-NumOfAns' value='";
                print count($questionStrings)-1;
                print "' /><div class='form-group'><label>Please fill in the blanks:</label></br>";
                print $questionStrings[0];
                for ($i=1; $i<count($questionStrings); $i++) {
                    print "<input type='text' name='question".$row['QID']."-ans".$i."' />";
                    print $questionStrings[$i];
                }
                print "</div>";
            }
            print "</div>";
        }
    }
    $stmt3 = $connect->prepare("SELECT expireTime, startTime FROM exams WHERE course = ? and examNum = ?");
    $stmt3->bind_param("si",$course,$examNum);
    $valid = $stmt3->execute();
    if (!$valid){
    	die("Could not successfully run query.". $connect->connect_error);
    }
    $result3 = $stmt3->get_result();
    $row = $result3->fetch_assoc();
    $endTimeValues = explode(":",$row['expireTime']);
    $startTimeValues = explode(":",$row['startTime']);
    date_default_timezone_set("Asia/Hong_Kong");
    $timer = (Intval($endTimeValues[0])-Intval(date("H")))*60*60*1000+(Intval($endTimeValues[1])-Intval(date("i"))-1)*60*1000+(60-Intval(date("s")))*1000;
    $fulltime = (Intval($endTimeValues[0])-Intval($startTimeValues[0]))*60*60*1000+(Intval($endTimeValues[1])-Intval($startTimeValues[1]))*60*1000;
    print '<input type="hidden" id="Timer" value="'.$timer.'" />';
    print '<input type="hidden" id="FullTime" value="'.$fulltime.'" />';
    print '<input type="hidden" name="NumOfQuestions" id="NumOfQuestions" value="'.$result2->num_rows.'" />';
    $connect->close();
?>