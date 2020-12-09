function login() {
    var enterID = document.getElementById("enterID").value;
    var password = document.getElementById("password").value;
    if ((password != "") && (enterID != "")) {
        var Request = new XMLHttpRequest();
        var info = "?enterID=" + enterID + "&password=" + password;
        Request.open("GET", "functionalphp/login.php" + info, true);
        Request.send();
        Request.onload = function() {
            var respond = Request.responseText;
            if (respond == "success") {
                window.location.href = "page/dashboard.html";
            } else {
                document.getElementById("errorMessage").innerText = respond;
            }
        }
    } else {
        document.getElementById("errorMessage").innerText = "Please fill in all the fields.";
    }
}

function redirect() {
    var Request = new XMLHttpRequest();
    Request.open("GET", "functionalphp/redirect.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond != "not logged.") {
            window.location.href = "functionalphp/redirect.php";
        }
    }
}