function Timeout() {
    var Request = new XMLHttpRequest();
    Request.open("GET", "../functionalphp/redirect.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond == "not logged.") {
            window.location.href = "../login.html";
        }
    }
}