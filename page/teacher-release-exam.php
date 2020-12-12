<!DOCTYPE html>
<html>
   <head>
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
               <p>Welcome! User</p>
               <li>
                  <a href="#">Dashboard</a>
               </li>
               <li class="active">
                  <a href="#">Releases an Exam</a>
               </li>
               <li>
                  <a href="teacher-view-exam.php">View Student's Exam</a>
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
                           <a class="nav-link" href="../login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>


            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-7">
                     <h3>Exam Questions</h3>
                     <form class="form" action="../functionalphp/teacher-add-exam.php " method="post" enctype="multipart/form-data" id="question-form">
                        <!--Painful Hell-->
                        <div class='dynamic-question-field'>
                           <!--Generate Questions Here When User click "Add Questions"-->
                        </div>
                        <input type="hidden" name="QuestionNumber" id="question-number" value="0" />
                        <input type="Submit" id="submit" hidden />
                  </div>
                  <div class="col-md-5">
                     <h3 class="container-fluid pl-3">
                        Exam Details
                     </h3>
                     <div class="container-fluid p-3">
                        <form role="form">
                           <div class="form-group">
                              <div class="error-message" id="errorMessage1" style="color:red;"></div>
                              <label for="course-name">Course Code:</label><select type="text" class="form-control" id="course-name" name="course-name" ></select>
                           </div>
                           <div class="form-group">
                              <label for="exam-date">
                              Exam Date: 
                              </label>
                              <input type="date" id="exam-date" name="exam-date" required />
                           </div>
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
                              <label for="exam-remarks">Remarks (Optional):</label><input type="text" class="form-control" id="exam-remarks" />
                           </div>
                           <div class="form-row form-group">
                              <div class="col">
                                 <button type="button" class="btn btn-primary" onclick="btnAddQuestion();">Add Question</button>
                              </div>
                              <div class="col">
                                 <button type="button" class="btn btn-primary" onclick="btnConfirmReleaseExam();">Confirm and Create Exam</button>
                              </div>
                           </form>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>

            <a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
</html>