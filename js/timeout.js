function Timeout() {
    var Request = new XMLHttpRequest();
    Request.open("GET", "../functionalphp/redirect.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond == "not logged.") {
            alert("Your login period has expired! Please login again!")
            window.location.href = "../login.html";
        }
    }
}