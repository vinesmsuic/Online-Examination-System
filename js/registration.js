function StudentForm() {
    if (document.getElementById("teacherac").classList.contains('active')) {
        document.getElementById("teacherac").classList.remove('active');
        document.getElementById("studentac").classList.add('active');
        document.getElementById("studentform").hidden = false;
        document.getElementById("teacherform").hidden = true;
        courseNum = parseInt(document.getElementById("coursenum").value);
        for (i = 1; i <= courseNum; i++) {
            document.getElementById("course" + i).required = false;
        }
        document.getElementById("birthday").required = true;
    }
}

function TeacherForm() {
    if (document.getElementById("studentac").classList.contains('active')) {
        document.getElementById("studentac").classList.remove('active');
        document.getElementById("teacherac").classList.add('active');
        document.getElementById("studentform").hidden = true;
        document.getElementById("teacherform").hidden = false;
        var courseNum = parseInt(document.getElementById("coursenum").value);
        for (i = 1; i <= courseNum; i++) {
            document.getElementById("course" + i).required = true;
        }
        document.getElementById("birthday").required = false;
    }
}

function MoreCourse() {
    var i = parseInt(document.getElementById("coursenum").value);
    i++;
    var j = i + 1;
    console.log(i);
    document.getElementById("course" + i + "space").innerHTML = '<input type="text" class="form-control" placeholder="Course * " name="course' + i + '" id="course' + i + '" required /></br><div id="course' + j + 'space"></div>';
    document.getElementById("coursenum").value = i;
}

function ResetCourse() {
    var courseNum = parseInt(document.getElementById("coursenum").value);
    if (courseNum > 1) {
        document.getElementById("course2space").remove();
    }
    document.getElementById("coursenum").value = 1;
    document.getElementById("course1space").innerHTML = '<input type="text" class="form-control" placeholder="Course * " name="course1" id="course1" required /></br><div id="course2space"></div>';
}

function Register() {
    var userID = document.getElementById("userID").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var email = document.getElementById("email").value;
    var valid = true;
    document.getElementById("errorMessage1").innerText = "";
    document.getElementById("errorMessage2").innerText = "";
    document.getElementById("errorMessage3").innerText = "";
    document.getElementById("errorMessage4").innerText = "";
    document.getElementById("errorMessage5").innerText = "";
    if ((userID != "") && (password != "") && (email != "")) {
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + userID;
        Request.open("GET", "../functionalphp/find-account.php" + info, true);
        Request.send();
        Request.onload = function() {
            var respond = Request.responseText;
            if (respond != "No such account") {
                document.getElementById("errorMessage1").innerText = "An account with the entered login ID has already been created. Please change your login ID.";
                valid = false;
            }
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!regex.test(email)) {
                document.getElementById("errorMessage2").innerText = "Please input a valid email address.";
                valid = false;
            }
            if (password != confirmPassword) {
                document.getElementById("errorMessage3").innerText = "The password does not match with the confirm password.";
                valid = false;
            }
            if (document.getElementById("option2").checked) {
                courseNum = parseInt(document.getElementById("coursenum").value);
                for (i = 1; i <= courseNum; i++) {
                    courseName = document.getElementById("course" + i).value;
                    console.log(courseName.includes(","));
                    if (courseName.includes(",")) {
                        valid = false;
                        document.getElementById("errorMessage4").innerText = "Course code cannot include character ','.";
                    }
                }
            }
            if (document.getElementById("security").value == "-1") {
                document.getElementById("errorMessage5").innerText = "Please select a question as your security question.";
                valid = false;
            }
            if (valid) {
                document.getElementById("submit").click();
            }
        }
    } else {
        document.getElementById("submit").click();
    }
}