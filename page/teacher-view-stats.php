<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/teacher-view-exam.js"></script>
   </head>
   <body onload="TimeoutAndRedirect('teacher');">
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <?php include '../functionalphp/get-nickname.php'; ?>
               <li>
                  <a href="teacher-dashboard.php">Dashboard</a>
               </li>
               <li >
                  <a href="teacher-release-exam.php">Releases an Exam</a>
               </li>
               <li >
                  <a href="teacher-checkandgrade-exam.php">Check and Grade a Paper</a>
               </li>
               <li class="active">
                  <a href="#">View Student's Exam</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                  <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <?php include "../functionalphp/teacher-get-statistics.php";?>
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