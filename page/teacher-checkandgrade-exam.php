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
         <?php include "teacher-sidebar-grade.php"; ?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <form action="teacher-grade-students.php" method="post" id="select-exam">
                           <?php include '../functionalphp/teacher-get-created-exam.php';?>
                           <input type="hidden" id="targetCourse" name="targetCourse" value="" />
                           <input type="hidden" id="targetCourseNum" name="targetCourseNum" value="" />
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