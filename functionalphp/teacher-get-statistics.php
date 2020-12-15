<?php
    include "mysql-connect.php";
    include "math-functions.php";

    $course = $_POST['statCourse'];
    $courseNum = intval($_POST['statCourseNum']);

    print '<h3>Overall Statistics</h3>';

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

    $standardDeviation = getSD($scoreArray);

    echo "<div class='container-fluid p-3 bg-white border'>
                <h5>Overall Performance</h5>
                <div class='form-group'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-lg'>
                            <label>Max: ".number_format((float)$maxTotalScore, 1, '.', '')." </label>
                        </div>
                        <div class='col-lg'>
                            <label>Min: ".number_format((float)$minTotalScore, 1, '.', '')." </label>
                        </div>
                        <div class='col-lg'>
                            <label>Median: ".number_format((float)$medianTotalScore, 1, '.', '')." </label>
                        </div>
                        <div class='col-lg'>
                            <label>Average: ".number_format((float)$averageTotalScore, 2, '.', '')." </label>
                        </div>
                        <div class='col-lg'>
                            <label>SD: ".number_format((float)$standardDeviation, 2, '.', '')." </label>
                        </div>
                    </div>
                </div>
                </div>
                <div class='container'>
                    <div class='row col-lg-6 mx-auto'>
                        <div id='chartContainer' style='max-height: 100%; height: 300px; max-width: 100%;'></div>
                    </div>
                </div>
            </div>
            <br>";


    //----------------------------------------
        
    $stmt1 = $connect->prepare("SELECT DISTINCT QID, AVG(score) AS 'avgStudentScore' FROM exam_answers WHERE course = ? AND examNum = ? GROUP BY QID");
    $stmt1->bind_param("si",$course,$courseNum);
    
    $valid = $stmt1->execute();
	if (!$valid){
	    die("Could not successfully run query.". $connect->connect_error);
    }
    $fullScore = 0;
    $result1 = $stmt1->get_result();
    
    while ($row = $result1->fetch_assoc()) {
        $QID = $row['QID'];

        $avgStudentScore = $row['avgStudentScore'];

        $recordNums = $result1->num_rows;



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

        if($maxScore != 0)
        {
            $correctRate = number_format((float)$avgStudentScore/$maxScore * 100, 2, '.', '');
        }
        else
        {
            $correctRate = number_format((float)100, 2, '.', '');
        }
        
    
        if($questionType == 1 || $questionType == 2)
        {
            $correctAns = $inside_row['answer'];

            if($questionType == 1)
            {
                $mc1 = $inside_row['mc1'];
                $mc2 = $inside_row['mc2'];
                $mc3 = $inside_row['mc3'];
                $mc4 = $inside_row['mc4'];

                switch($correctAns)
                {
                    case 1:
                        $correctAns = $mc1;
                        break; 
                    case 2:
                        $correctAns = $mc2;
                        break;   
                    case 3:
                        $correctAns = $mc3;
                        break; 
                    case 4:
                        $correctAns = $mc4;
                        break;                           
                }
            }
            else if($questionType == 2)
            {
                switch($correctAns)
                {
                    case 1:
                        $correctAns = "True";
                        break; 
                    case 0:
                        $correctAns = "False";
                        break;                          
                }
            }

            echo "<div class='container-fluid p-3 bg-white border question".$QID."'> 
            <h5>Question ".$QID." (".$maxScore." marks)</h5> <div class='form-group'> 
            <label>Question:</label> <div class='container'>".$questionText."</div> 
            </div>
            <div class='form-group'> 
            <label>Correct Answer:</label> <div class='container'>".$correctAns."</div> </div> 
            <div class='form-group'> 
            <label>Students' Performance on this Question:</label>
                <div class='container'>
                <div class='row'>
                <div class='col-sm'>
                    <label>Correct Rate: ".$correctRate."% </label>
                </div>
                <div class='col-sm'>
                    <label>Average Student Score: ".number_format((float)$avgStudentScore, 2, '.', '')." </label>
                </div>
                </div>
                </div> 
            </div> 
            </div><br>";
            
        }
        else if ($questionType == 3)
        {

            echo "<div class='container-fluid p-3 bg-white border question".$QID."'> 
            <h5>Question ".$QID." (".$maxScore." marks)</h5> <div class='form-group'> 
            <label>Question:</label> <div class='container'>".$questionText."</div> 
            </div>
            <div class='form-group'> 
            <label>Students' Performance on this Question:</label>
                <div class='container'>
                <div class='row'>
                <div class='col-sm'>
                    <label>Correct Rate: ".$correctRate."% </label>
                </div>
                <div class='col-sm'>
                    <label>Average Student Score: ".number_format((float)$avgStudentScore, 2, '.', '')." </label>
                </div>
                </div>
                </div> 
            </div>  
            </div><br>";

        }
        else if ($questionType == 4)
        {
            
            echo "<div class='container-fluid p-3 bg-white border question".$QID."'> 
            <h5>Question ".$QID." (".$maxScore." marks)</h5> <div class='form-group'> 
            <label>Question:</label> <div class='container'>";
            $questionStrings = explode("__BLANK__",$questionText);
            print $questionStrings[0];
            for ($i=1; $i<count($questionStrings); $i++) {
                print "<input type='text' disabled />";
                print $questionStrings[$i];
            }    
            print "</div></div><div class='form-group'> 
            <label>Students' Performance on this Question:</label>
                <div class='container'>
                <div class='row'>
                <div class='col-sm'>
                    <label>Correct Rate: ".$correctRate."% </label>
                </div>
                <div class='col-sm'>
                    <label>Average Student Score: ".number_format((float)$avgStudentScore, 2, '.', '')." </label>
                </div>
                </div>
                </div> 
            </div> 
            </div><br>";
            
        }

        $fullScore += $maxScore;
    }

    
    $connect->close();
?>    

<script>
    var data = <?php echo json_encode($scoreArray, JSON_NUMERIC_CHECK); ?>;
    var fullScore = <?php echo $fullScore; ?>;
    var courseName = <?php echo json_encode($course); ?>;
    
    function getOccurence(arr) {
        var a = [], b = [], prev;
        
        arr.sort();
        for ( var i = 0; i < arr.length; i++ ) {
            if ( arr[i] !== prev ) {
                a.push(arr[i]);
                b.push(1);
            } else {
                b[b.length-1]++;
            }
            prev = arr[i];
        }
        
        return [a, b];
    }

    var result = getOccurence(data);

    var keys = result[0];
    var freqs = result[1];

    var output = keys.map(function(obj,index){
    var myobj = {};
    myobj[freqs[index]] = obj;
    return {
            x: myobj[freqs[index]],
            y: freqs[index]
        };
    });

    titleText = "Score Distribution of " + courseName;

    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {  
            title: {
                text: titleText
            },
            interactivityEnabled: true,
            animationEnabled: true,
            animationDuration: 800,
            exportFileName: titleText,
            exportEnabled: true,
            zoomEnabled:true,
            zoomType: "xy",
            theme: "light1",
            backgroundColor: "white",

            axisY: {
                minimum: 0,
                title: "Students"
                
            },
            axisX: {
                minimum: 0,
                maximum: fullScore,
                title: "Score"
                
            },
            data: [{
                type: "splineArea",
                dataPoints: output
            }]
        });
        chart.render();
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>