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
               <li>
                    <a href="student-take-exam.php">Take Exam</a>
               </li>
               <li class="active">
                    <a href="#">View Result</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="container-fluid">
                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                  <i class="fas fa-align-left"></i>
                  <span></span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-align-justify"></i>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="../functionalphp/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
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