function AttemptExam(course,examNum) {
    document.getElementById("course").value = course;
    document.getElementById("examNum").value = examNum;
    document.getElementById("attemptExam").submit();
}