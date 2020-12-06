function login() {
    if ((password != "") && (enterID != "")) {
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + document.getElementById("enterID").value + "&password=" + document.getElementById("password").value;
        Request.open("GET", "http://localhost/web/Online-Examination-System/php/login.php" + info, true);
        Request.send();
        Request.onload = function() {
            var respond = Request.responseText;
            if ((respond == "fail to find account") || (respond == "password not matching")) {
                document.getElementById("errorMessage").innerText = respond;
            } else if (respond == "success") {
                window.location.href = "http://www.w3schools.com";
            }
        }
    }
}