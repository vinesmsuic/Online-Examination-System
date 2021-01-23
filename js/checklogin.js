function login() {
    var enterID = document.getElementById("enterID").value;
    var password = document.getElementById("password").value;
   if ((password != "") && (enterID != "")) {

 var info = "?enterID=" + enterID + "&password=" + password;
 
 $.ajax
({
  type: "GET",
  url: "functionalphp/login.php"+info,
  success: function(respond)
  {
  
            if (respond == "admin") {
                window.location.href = "page/admin-system-management.php";
            } else if (respond == "student"){
                window.location.href = "page/student-dashboard.php";
            } else if (respond == "teacher"){
                window.location.href = "page/teacher-dashboard.php";
            } else{
                document.getElementById("errorMessage").innerText = respond;
            }  
  
 
  }
});
}
 
    else {
        document.getElementById("errorMessage").innerText = "Please fill in all the fields.";
    }
}

function redirect() {

 $.ajax
({
  type: "GET",
  url: "functionalphp/redirect.php",
  success: function(respond)
  {
  
                 if (respond != "not logged.") {
            if (respond == "admin") {
                window.location.href = "page/admin-system-management.php";
            } else if (respond == "student"){
                window.location.href = "page/student-dashboard.php";
            } else if (respond == "teacher"){
                window.location.href = "page/teacher-dashboard.php";
            }
        }
  
 
  }
});
}
