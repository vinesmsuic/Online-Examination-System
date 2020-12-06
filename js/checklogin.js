function updateList() {
    var Request = new XMLHttpRequest();
    Request.open("GET", "http://localhost/web/Online-Examination-System/main.html", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond == "fail to find account") {

        } else if (respond == "password not matching") {

        } else if (respond == "success") {

        }
        document.getElementById("eIDList").innerHTML = optionList;
    }
}