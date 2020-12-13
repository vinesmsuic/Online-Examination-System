var questionNumbers = 0;


//Teacher Add Question for an Exam
function btnAddQuestion() {
    var chunk = "<div class='container-fluid p-3 bg-white border question1'> <script> $(document).ready(function() { $('#question1-type').change(function() { console.log($('#question1-type option:selected').val()); if($('#question1-type option:selected').val() == 1) { $('.question1-tfq').hide(); $('.question1-mcq').show(); $('.question1-fbq').hide(); } else if ($('#question1-type option:selected').val() == 2) { $('.question1-mcq').hide(); $('.question1-tfq').show(); $('.question1-fbq').hide(); } else if ($('#question1-type option:selected').val() == 3) { $('.question1-tfq').hide(); $('.question1-mcq').hide(); $('.question1-fbq').hide(); } else { $('.question1-tfq').hide(); $('.question1-mcq').hide(); $('.question1-fbq').show(); } }); }); </script> <h5 id='question1'>Question 1</h5> <div class='form-group'> <label>Question:</label> <textarea class='form-control' id='question1-q' name='question1-q' rows='3'></textarea> <div class='question1-fbq' style='display: none;'> <label>Use __BLANK__ to create a blank for students to input.</label> </div> </div> <div class='form-row form-group'> <div class='col'> <label>Question-type</label> <select class='form-control' id='question1-type' name='question1-type'> <option value='1'>Multiple Choice</option> <option value='2'>TRUE or FALSE</option> <option value='3'>Short answer</option> <option value='4'>Fill in the blank</option> </select> </div> <div class='col'> <label>Score</label> <input type='number' class='form-control' placeholder='' id='question1-score' name='question1-score' min='0' max='1000' required /> </div> </div> <div class='question1-mcq'> <div class='form-row form-group'> <div class='col'> <label>1st Choice</label> <input type='text' class='form-control' placeholder='' id='question1-mc-choice1' name='question1-mc-choice1' /> </div> <div class='col'> <label>2nd Choice</label> <input type='text' class='form-control' placeholder='' id='question1-mc-choice2' name='question1-mc-choice2' /> </div> </div> <div class='form-row form-group'> <div class='col'> <label>3rd Choice</label> <input type='text' class='form-control' placeholder='' id='question1-mc-choice3' name='question1-mc-choice3' /> </div> <div class='col'> <label>4th Choice</label> <input type='text' class='form-control' placeholder='' id='question1-mc-choice4' name='question1-mc-choice4' /> </div> </div> <div class='form-group'> <label>Correct Answer for MC Question</label> <select class='form-control' id='question1-mcq-correct' name='question1-mcq-correct'> <option value='1'>1st Choice</option> <option value='2'>2nd Choice</option> <option value='3'>3rd Choice</option> <option value='4'>4th Choice</option> </select> </div> </div> <div class='question1-tfq' style='display: none;'> <div class='form-group'> <label>Correct Answer for TF Question</label> <select class='form-control' id='question1-tfq-correct' name='question1-tfq-correct'> <option value='1'>TRUE</option> <option value='0'>FALSE</option> </select> </div> </div> </div><br>";

	questionNumbers += 1;


    //https://stackoverflow.com/questions/494035/how-do-you-use-a-variable-in-a-regular-expression
    chunk = chunk.split('question1').join('question' + questionNumbers);
    chunk = chunk.split('Question 1').join('Question ' + questionNumbers);

    $(".dynamic-question-field").append(chunk);

}

//Teacher Confirm creating an Exam
function btnConfirmReleaseExam() {
	console.log(questionNumbers);
	document.getElementById("errorMessage1").innerText = "";
	document.getElementById("errorMessage2").innerText = ""
	document.getElementById("question-number").value = questionNumbers;
	var valid = true;
	if (document.getElementById("course-name").value == ",,"){
		document.getElementById("errorMessage1").innerText = "Please select a course.";
		valid = false;
	} 
	if ((document.getElementById("start-time").value!="")&&(document.getElementById("end-time").value!="")){
		var startTime = (document.getElementById("start-time").value).split(":");
		var endTime = (document.getElementById("end-time").value).split(":");
		if (parseInt(startTime[0]) > parseInt(endTime[0])){
			document.getElementById("errorMessage2").innerHTML = "Please select a valid time.";
			valid = false;
		} else if ((parseInt(startTime[0]) == parseInt(endTime[0]))&&(parseInt(startTime[1]) >= parseInt(endTime[1]))){
			document.getElementById("errorMessage2").innerHTML = "Please select a valid time.";
			valid = false;
		}
	}
	if (valid){
		document.getElementById("submit").click();
	}
	
}

function getCourseList(){
	var Request = new XMLHttpRequest();
	Request.open("GET", "../functionalphp/check-course-code.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond != "Account error.") {
			var courses = respond.split(",");
			var optionList = "<option value=',,' selected disabled hidden></option>";
			for (i=0; i<courses.length; i++){
				optionList+='<option value="'+courses[i]+'">'+courses[i]+'</option>';
			}
			document.getElementById("course-name").innerHTML = optionList;
        } else {
            window.location.href = "../functionalphp/logout.php";
        }
    }
}

//Back to Top Button using JQuery
$(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});

