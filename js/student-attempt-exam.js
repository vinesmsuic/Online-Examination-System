function SetTimer(){ 
    var time = parseInt(document.getElementById("Timer").value);
    if (time<0){
        alert("This exam has already expired!");
        window.location.href = "../page/student-dashboard.php";
    } else {
        window.setTimeout(function() { 
            document.getElementById("submitType").value = "timeout"; 
            document.getElementById("submitExam").submit(); }, time);
    }
}
