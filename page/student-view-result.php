<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/student-choose-exam.js"></script>
   </head>
   <body onload="TimeoutAndRedirect('student');">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "student-sidebar-view.php";?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <form action="../page/student-view-graded-exam.php " method="post" id="chooseExam">
                        <?php include "../functionalphp/student-get-graded-exams.php";?>
                        <input type="hidden" id="course" name="targetCourse" value="" />
                        <input type="hidden" id="examNum" name="targetCourseNum" value="" />
                        <input type="hidden" id="targetstudentID" name="targetstudentID" value="<?php if (ISSET($_COOKIE['userID'])) { echo $_COOKIE['userID'];}?>" />
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
</html>