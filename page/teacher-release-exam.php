<!DOCTYPE html>
<html>
   <head>
   <?php include '../functionalphp/page-type-teacher.php';?>
      <?php include '../functionalphp/main-head.php';?>
      <script src="../js/teacher-add-questions.js"></script>
   </head>

   <body onload="btnAddQuestion(); getCourseList();">
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
               <li class="active">
                  <a href="#">Releases an Exam</a>
               </li>
               <li >
                  <a href="teacher-checkandgrade-exam.php">Check and Grade a Paper</a>
               </li>
               <li>
                  <a href="teacher-view-exam.php">View Student's Exam</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>


            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-7">
                     <h3>Exam Questions</h3>
                     <form class="form" action="../functionalphp/teacher-add-exam.php " method="post" enctype="multipart/form-data" id="question-form">
                        <!--Painful Hell-->
                        <div class='dynamic-question-field'>
                           <!--Generate Questions Here When User click "Add Questions"-->
                        </div>
                        <input type="hidden" name="question-number" id="question-number" value="0" />
                        <input type="hidden" name="creator" id="creator" value="<?php if (ISSET($_SESSION['userID'])) { echo $_SESSION['userID'];}?>" />
                        <input type="Submit" id="submit" hidden />
                  </div>
                  <div class="col-md-5">
                     <h3 class="container-fluid pl-3">
                        Exam Details
                     </h3>
                     <div class="container-fluid p-3">
                           <div class="form-group">
                              <div class="error-message" id="errorMessage1"></div>
                              <label for="course-name">Course Code:</label><select type="text" class="form-control" id="course-name" name="course-name" ></select>
                           </div>
                           <div class="error-message" id="errorMessage2"></div>
                           <div class="form-group">
                              <label for="exam-date">
                              Exam Date: 
                              </label>
                              <input type="date" id="exam-date" name="exam-date" required />
                           </div>
                           <div class="error-message" id="errorMessage3"></div>
                           <div class="form-row form-group">
                              <div class="col">
                                 <label for="start-time">Start Time: </label>
                                 <input type="time" id="start-time" name="start-time" required />
                              </div>
                              <div class="col">
                                 <label for="end-time">End Time: </label>
                                 <input type="time" id="end-time" name="end-time" required />
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="exam-remarks">Remarks (Optional):</label><input type="text" class="form-control" id="exam-remarks" name="exam-remarks" />
                           </div>
                           <div class="form-row form-group">
                              <div class="col">
                                 <button type="button" class="btn btn-primary" onclick="btnAddQuestion();">Add Question</button>
                              </div>
                              <div class="col">
                                 <button type="button" class="btn btn-primary" onclick="btnConfirmReleaseExam();">Confirm and Create Exam</button>
                              </div>
                           </div>
                        </form>
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