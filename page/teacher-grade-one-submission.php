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
                     <form action="../functionalphp/teacher-update-grade-to-server.php" method="post" id="update-grade-to-server">
                        <?php include '../functionalphp/teacher-get-selectedstudent-ans.php';?>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-lg form-control" onclick="updateStudentGradesToServer();">Confirm Marking</button>
                            <input type="Submit" id="update-submit" hidden />
                        </div>
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