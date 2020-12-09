function showAccounts() {
    var myRequest = new XMLHttpRequest();
    myRequest.open("GET", "../functionalphp/admin-select-account.php", true);
    myRequest.send();
    myRequest.onload = function() {
        console.log(this.responseText);
        document.getElementById("account").innerHTML = this.responseText;
    }
}

function btnDelete() {
    var myRequest = new XMLHttpRequest();
    var selectedID = document.getElementById("account").value;
    var info = "?enterID=" + selectedID;
    myRequest.open("GET", "../functionalphp/admin-delete-account.php" + info, true);
    myRequest.send();
    myRequest.onload = function() {
        var respond = this.responseText;
    }
}

function btnModify() {
    var selectedID = document.getElementById("account").value;
    location.href = "admin-modify-account.php";
}

function btnAdd() {
    location.href = "admin-add-account.php";
}