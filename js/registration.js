

function StudentForm() {
    if (document.getElementById("teacherac").classList.contains('active')){
        document.getElementById("teacherac").classList.remove('active');
        document.getElementById("studentac").classList.add('active');
        document.getElementById("studentform").hidden = false;
        document.getElementById("teacherform").hidden = true;
    }
}

function TeacherForm() {
    if (document.getElementById("studentac").classList.contains('active')){
        document.getElementById("studentac").classList.remove('active');
        document.getElementById("teacherac").classList.add('active');
        document.getElementById("studentform").hidden = true;
        document.getElementById("teacherform").hidden = false;
    }
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
    if ((userID!="")&&(password!="")&&(email!="")){
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + userID;
        Request.open("GET", "php/check-registration.php" + info, true);
        Request.send();
        Request.onload = function() {
            var respond = Request.responseText;
            if (respond != "Accepted") {
                document.getElementById("errorMessage1").innerText = respond;
                valid = false;
            }
        }
        const regex = "/([\w.-]+)@([\w.-]+)(.[\w.]+)/";
        if (!regex.test(email)){
            document.getElementById("errorMessage2").innerText = "Please input a valid email address.";
            valid = false;
        }
        if (password!=confirmPassword){
            document.getElementById("errorMessage3").innerText = "The password does not match with the confirm password.";
            valid = false;
        }
        if (valid){
            document.getElementById("registerForm").submit;
        }
    } else {
        document.getElementById("registerForm").submit;
    }
}