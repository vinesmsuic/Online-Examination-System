<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/student-choose-exam.js"></script>
   </head>
   <body onload="Timeout();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <?php include '../functionalphp/get-nickname.php'; ?>
               <li>
                    <a href="student-dashboard.php">Dashboard</a>
               </li>
               <li class="active">
                    <a href="#">Take Exam</a>
               </li>
               <li>
                    <a href="student-view-result.php">View Result</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <form action="../page/student-attempt-exam.php " method="post" id="chooseExam">
                        <?php include "../functionalphp/student-get-current-exams.php";?>
                        <input type="hidden" id="examNum" name="examNum" value="" />
                        <input type="hidden" id="course" name="course" value="" />
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