function SetTimer(){ 
    document.getElementById("DisplayTimer").max = parseInt(document.getElementById("FullTime").value);
    if (parseInt(document.getElementById("Timer").value)<0){
        alert("This exam has already expired!");
        window.location.href = "../page/student-dashboard.php";
    } else { 
        CountDown();
        window.setInterval(CountDown, 1000);
    }
}
function CountDown(){
    var time = parseInt(document.getElementById("FullTime").value);
    var remainingTime = parseInt(document.getElementById("Timer").value) - 1000;
    document.getElementById("Timer").value = remainingTime;
    if (remainingTime < 0) {
        window.clearInterval();
        document.getElementById("submitType").value = "timeout"; 
        document.getElementById("submitExam").submit();
    } else {
        var hours = Math.floor((remainingTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
        document.getElementById("DisplayTimeValue").innerText = "Remaining time:" + hours + "h "
        + minutes + "m " + seconds + "s ";
        var percentage =  ((time-remainingTime)/time) * 100;
        document.getElementById("DisplayTimer").style.width = percentage + "%";
    }
}