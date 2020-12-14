var answer,userID;
function GetQuestion(){
    document.getElementById("errorMessage1").innerText = "";
    userID = document.getElementById("userID").value;
    if (userID==""){
        document.getElementById("errorMessage1").innerText = "Please input an ID.";
    } else {
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + userID;
        Request.open("GET", "../functionalphp/get-security-info.php" + info, true);
        Request.send();
        Request.onload = function() {
        var respond = Request.responseText;
        if (respond != "No such account") {
            document.getElementById("userID").value = userID;
            var accountInfo = JSON.parse(Request.responseText);
            document.getElementById("questionType").value = accountInfo.SQType;
            document.getElementById("sampleAnswer").value = accountInfo.SQAnswer;
            switch(parseInt(document.getElementById("questionType").value)){
                case 1: document.getElementById("question").innerText = "Where do you live?";
                    break;
                case 2: document.getElementById("question").innerText = "What game do you like?";
                    break;
                case 3: document.getElementById("question").innerText = "Who is your favorite athelete?";
                    break;
                case 4: document.getElementById("question").innerText = "What is the name of your father?";
                    break;
                case 5: document.getElementById("question").innerText = "What is your dream?";
                    break;
            }
            document.getElementById("DialogBox1").hidden = true;
            document.getElementById("DialogBox2").hidden = false;
        } else {
            document.getElementById("errorMessage1").innerText = "Failed to find an account with the input ID.";
        }
    }
    }
    
}
function CheckAnswer(){
    if (document.getElementById("answer").value==document.getElementById("sampleAnswer").value){
        document.getElementById("DialogBox2").hidden = true;
        document.getElementById("DialogBox3").hidden = false;
    } else {
        document.getElementById("errorMessage2").innerText = "The answer is wrong. Please try again.";
    }
}
function ChangePassword(){
    document.getElementById("errorMessage3").innerText = "";
    if ((document.getElementById("password").value!="")&&(document.getElementById("confirmPassword").value!="")){
        if (document.getElementById("password").value==document.getElementById("confirmPassword").value){
            document.getElementById("changePassword").submit();
        } else {
            document.getElementById("errorMessage3").innerText = "The password does not match with the confirm password.";
        }
    } else {
        document.getElementById("errorMessage3").innerText = "Please input both fields.";
    }
}