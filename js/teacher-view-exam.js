function btnGradeForAllStudents(selectedCourse, examNum) {
    document.getElementById("targetCourse").value = selectedCourse;
    document.getElementById("targetCourseNum").value = examNum;
    //Go to php page teacher-grade-students.php
    document.getElementById("select-exam").submit();
}

function btnGradeForStudent(selectedCourse, examNum, studentID) {
    document.getElementById("targetCourse").value = selectedCourse;
    document.getElementById("targetCourseNum").value = examNum;
    document.getElementById("targetstudentID").value = studentID;
    //Go to php page teacher-grade-students.php
    document.getElementById("select-student").submit();
}

function updateStudentGradesToServer(){
    //let qTotal = document.getElementById("qTotal").value;
    document.getElementById("update-submit").click();
}

function releaseResultsToStudents(selectedCourse, examNum){
    document.getElementById("releaseCourse").value = selectedCourse;
    document.getElementById("releaseCourseNum").value = examNum;
    document.getElementById("release-results").submit();
}

function btnViewGradesForAllStudents(selectedCourse, examNum){
    document.getElementById("targetCourse").value = selectedCourse;
    document.getElementById("targetCourseNum").value = examNum;
    document.getElementById("select-graded-exam").submit();
}

function btnViewGradeForStudent(selectedCourse, examNum, studentID){
    document.getElementById("targetCourse").value = selectedCourse;
    document.getElementById("targetCourseNum").value = examNum;
    document.getElementById("targetstudentID").value = studentID;
    document.getElementById("select-graded-student").submit();
}