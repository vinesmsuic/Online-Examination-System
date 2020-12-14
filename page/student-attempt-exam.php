<!DOCTYPE html>
<html>
    <head>
       <?php include '../functionalphp/main-head.php';?>
       <script src="../js/student-attempt-exam.js"></script>
    </head>
    <body class="jumbotron vertical-center" onload="TimeoutAndRedirect('student'); SetTimer();">
    <div class="container">
        <div class="row">
            <div class="col-md-10 login-form mx-auto">
                <div class="container-fluid p-3 bg-white border">
                    <h3>Exam Questions</h3>
                    <h4 id="DisplayTimeValue"></h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped active" role="progressbar" id="DisplayTimer"></div>
                    </div>
                    </br>
                    <form class="form" action="../functionalphp/student-submit-exam.php " method="post" enctype="multipart/form-data" id="submitExam">
                    <input type="hidden" name="course" id="course" value="<?php echo $_POST['course'];?>" />
                    <input type="hidden" name="examNum" id="examNum" value="<?php echo $_POST['examNum'];?>" />
                    <input type="hidden" name="submitType" id="submitType" value="action" />
                    <?php include '../functionalphp/student-get-exam-paper.php';?>
                    <button type="submit" class="btn btn-block btn-primary">Submit</button>  
                    </div>
                </div>
            </div>
        </div>
        </form>
    </body>
    <?php include '../functionalphp/main-foot.php';?>
    <?php include '../functionalphp/back-to-top-btn.php';?>
</html>