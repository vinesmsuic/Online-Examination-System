

function StudentForm() {
    if (document.getElementById("teacherac").classList.contains('active')){
        document.getElementById("teacherac").classList.remove('active');
        document.getElementById("studentac").classList.add('active');
        document.getElementById("studentform").hidden = false;
        document.getElementById("teacherform").hidden = true;
    }
    document.getElementById("")
}

function TeacherForm() {
    if (document.getElementById("studentac").classList.contains('active')){
        document.getElementById("studentac").classList.remove('active');
        document.getElementById("teacherac").classList.add('active');
        document.getElementById("studentform").hidden = true;
        document.getElementById("teacherform").hidden = false;
    }
}

function Register() {

}