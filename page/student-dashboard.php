<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/student-motivation.js"></script>
   </head>
   <body onload="Timeout(); loadMotivationQuote();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <?php include '../functionalphp/get-nickname.php'; ?>
               <li class="active">
                    <a href="#">Dashboard</a>
               </li>
               <li>
                  <a href="student-take-exam.php">Take Exam</a>
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
                     <div class="row">
                        <div class="col-md-6 p-3 bg-white border">
                           <div class="alert alert-dismissable alert-info">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                              ×
                              </button>
                              <h4>
                                 Alert!
                              </h4>
                              <strong>You have these exams this semester.</strong> Please note and good luck!
                           </div>
                           <?php include "../functionalphp/student-get-future-exams.php";?>
                        </div>
                        <div class="col-md-6 p-3 bg-white border">
                           <blockquote class="blockquote">
                              <p class="mb-0" id="motivation"></p>
                              <footer class="blockquote-footer" id="motivation-footer"></footer>
                           </blockquote>
                           <h6>Exam Tips</h6>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail First" src="../img/studytips-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Practice on pastpapers
                                       </h5>
                                       <p class="card-text">
                                          One of the most effective ways to prepare for exams is to practice taking past versions. This helps you get used to the format of the questions, and - if you time yourself - can also be good practice for making sure you spend the right amount of time on each section.
                                       </p>
                                       <p>
                                          
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail Second" src="../img/studytips-2.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Plan your exam day
                                       </h5>
                                       <p class="card-text">
                                          Make sure you get everything ready well in advance of the exam - don't leave it to the day before to suddenly realize you don't know the way, or what you're supposed to bring. Check all the rules and requirements, and plan your route and journey time. If possible, do a test run of the trip. If not, write down clear directions.
                                       </p>
                                       <p>
                                          
                                       </p>
                                    </div>
                                 </div>
                              </div>

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
</html>