function InfoSet(ID) {
    document.getElementById("message").innerText = "Modifying Account ID: " + ID;
    var Request = new XMLHttpRequest();
    var info = "?enterID=" + ID;
    Request.open("GET", "../functionalphp/find-account.php" + info, true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        console.log(respond);
        if (respond != "No such account") {
            var accountInfo = JSON.parse(Request.responseText);
            upload = false;
            document.getElementById("originalID").value = ID;
            document.getElementById("userID").value = ID;
            document.getElementById("usertype").value = accountInfo.userType;
            document.getElementById("password").value = accountInfo.PW;
            document.getElementById("email").value = accountInfo.email;
            document.getElementById("security").value = accountInfo.sQType;
            document.getElementById("securityAnswer").value = accountInfo.sQAnswer;
            document.getElementById("avatarSpace").innerHTML = "<label>Current profile image: </label>&nbsp;&nbsp;&nbsp;&nbsp;<img src='../img/client/" + accountInfo.profileImage + "' alt='' class='profileimage' />&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' value='Change' class='btn btn-primary' onclick='ChangeImage();' />";
            document.getElementById("nickName").value = accountInfo.nickName;
            if (accountInfo.userType == "student") {
                document.getElementById("studentform").hidden = false;
                document.getElementById("course1").required = false;
                if (document.getElementById("male").value == accountInfo.gender) {
                    document.getElementById("male").checked = true;
                } else {
                    document.getElementById("female").checked = true;
                }
                document.getElementById("birthday").value = accountInfo.birthday;

            } else if (accountInfo.userType == "teacher") {
                document.getElementById("teacherform").hidden = false;
                document.getElementById("birthday").required = false;
                var courses = (accountInfo.course).split(",");
                document.getElementById("course1").value = courses[0];
                for (i = 2; i <= courses.length; i++) {
                    MoreCourse();
                    document.getElementById("course" + i).value = courses[i - 1];
                }
            }
        }
    }
}

function ChangeImage() {
    document.getElementById("avatarSpace").innerHTML = "<label>Upload the profile image: </label><input type='file' class='form-control-file' name='avatar' accept='image/*' required />";
    document.getElementById("imgUpload").value = "true";
}

function MoreCourse() {
    var i = parseInt(document.getElementById("coursenum").value);
    i++;
    var j = i + 1;
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

function Modify() {
    var userID = document.getElementById("userID").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var valid = true;
    document.getElementById("errorMessage1").innerText = "";
    document.getElementById("errorMessage2").innerText = "";
    document.getElementById("errorMessage3").innerText = "";
    document.getElementById("errorMessage4").innerText = "";
    if ((userID != "") && (password != "") && (email != "")) {
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + userID;
        Request.open("GET", "../functionalphp/find-account.php" + info, true);
        Request.send();
        Request.onload = function() {
            var respond = Request.responseText;
            if ((respond != "No such account")&&(userID != document.getElementById("originalID").value)) {
                document.getElementById("errorMessage1").innerText = "An account with the entered login ID has already been created. Please change your login ID.";
                valid = false;
            }
            const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!regex.test(email)) {
                document.getElementById("errorMessage2").innerText = "Please input a valid email address.";
                valid = false;
            }
            if (document.getElementById("usertype") == "teacher") {
                courseNum = parseInt(document.getElementById("coursenum").value);
                for (i = 1; i <= courseNum; i++) {
                    courseName = document.getElementById("course" + i).value;
                    console.log(courseName.includes(","));
                    if (courseName.includes(",")) {
                        valid = false;
                        document.getElementById("errorMessage3").innerText = "Course code cannot include character ','.";
                    }
                }
            }
            if (document.getElementById("security").value == "-1") {
                document.getElementById("errorMessage4").innerText = "Please select a question as your security question.";
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