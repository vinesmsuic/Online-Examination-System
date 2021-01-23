<!DOCTYPE html>
<html>
   <head>
   <?php include '../functionalphp/page-type-teacher.php';?>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/teacher-view-exam.js"></script>
   </head>
   <body>
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
                     <form action="teacher-view-graded-students.php" method="post" id="select-graded-exam">
                           <?php include '../functionalphp/teacher-get-graded-exams.php';?>
                           <input type="hidden" id="targetCourse" name="targetCourse" value="" />
                           <input type="hidden" id="targetCourseNum" name="targetCourseNum" value="" />
                     </form>
                     <form action="teacher-view-stats.php" method="post" id="select-stat">
                           <input type="hidden" id="statCourse" name="statCourse" value="" />
                           <input type="hidden" id="statCourseNum" name="statCourseNum" value="" />
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