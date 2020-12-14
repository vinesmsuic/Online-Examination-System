<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/teacher-view-exam.js"></script>
   </head>
   <body onload="Timeout();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "teacher-sidebar-view.php" ;?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                  <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <form action="teacher-view-graded-one-submission.php" method="post" id="select-graded-student">
                           <?php include '../functionalphp/teacher-get-allstudents-graded-result.php';?>
                           <input type="hidden" id="targetCourse" name="targetCourse" value="" />
                           <input type="hidden" id="targetCourseNum" name="targetCourseNum" value="" />
                           <input type="hidden" id="targetstudentID" name="targetstudentID" value="" />
                     </form>
                  </div>
               </div>
            </div>
                  </div>
               </div>
            </div>
         
         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
   <?php include '../functionalphp/back-to-top-btn.php';?>
</html>