<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/teacher-view-exam.js"></script>
   </head>
   <body onload="TimeoutAndRedirect('teacher');">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "teacher-sidebar-grade.php"; ?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <form action="teacher-grade-one-submission.php" method="post" id="select-student">
                           <?php include '../functionalphp/teacher-get-allstudents-answer.php';?>
                           <input type="hidden" id="targetCourse" name="targetCourse" value="" />
                           <input type="hidden" id="targetCourseNum" name="targetCourseNum" value="" />
                           <input type="hidden" id="targetstudentID" name="targetstudentID" value="" />
                     </form>
                     <form action="../functionalphp/teacher-release-results.php" method="post" id="release-results">
                            <input type="hidden" id="releaseCourse" name="releaseCourse" value="" />
                           <input type="hidden" id="releaseCourseNum" name="releaseCourseNum" value="" />
                     </form>
                  </div>
               </div>
            </div>
         
         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
   <?php include '../functionalphp/back-to-top-btn.php';?>
</html>