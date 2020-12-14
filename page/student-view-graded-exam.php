<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
   </head>
   <body onload="Timeout();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "student-sidebar-view.php";?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                  <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                           <?php include '../functionalphp/get-student-graded-result.php';?>  
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