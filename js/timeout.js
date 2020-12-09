function Timeout() {
    var Request = new XMLHttpRequest();
    Request.open("GET", "http://localhost/web/Online-Examination-System/redirect.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond == "not logged."){
            window.location.href = "http://localhost/web/Online-Examination-System/main.html";
        } 
    }
}