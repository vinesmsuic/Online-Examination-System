function TimeoutAndRedirect(Type) {
    var Request = new XMLHttpRequest();
    Request.open("GET", "../functionalphp/redirect.php", true);
    Request.send();
    Request.onload = function() {
        var respond = Request.responseText;
        if (respond == "not logged.") {
            alert("Your login period has expired! Please login again!");
            window.location.href = "../login.html";
        } else if (respond != Type) {
            alert("You cannot access this page using your account!");
            if (respond == "admin") {
                window.location.href = "../page/admin-system-management.php";
            } else if (respond == "student"){
                window.location.href = "../page/student-dashboard.php";
            } else if (respond == "teacher"){
                window.location.href = "../page/teacher-dashboard.php";
            }
        }
    }
}