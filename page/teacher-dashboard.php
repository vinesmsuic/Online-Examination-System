<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
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
               <li class="active">
                  <a href="#">Dashboard</a>
               </li>
               <li>
                  <a href="teacher-release-exam.php">Releases an Exam</a>
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
                  <div class="col-md-8 p-3 bg-white border">
                     <div class="alert alert-dismissable alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        ×
                        </button>
                        <h4>
                           Welcome!
                        </h4>
                        If you are using this service for the first time, please read the descriptions.
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <dl>
                              <dt>
                                 Releases An Exam
                              </dt>
                              <dd>
                                 You can create an exam by specifying the time slot and the questions. We support 4 types of questions, including Multiple Choices, True False Questions, Fill in the blank and Short Answer.
                              </dd>
                              <dt>
                                 Check and Grade a Paper
                              </dt>
                              <dd>
                                 The system can automatically grade the Multiple Choices and True False Questions, However you need to grade the others yourself. After grading all submissions, remember to publish the result so students can see it! 
                              </dd>
                              <dt>
                                 View Student's Exam
                              </dt>
                              <dd>
                                 Statistics of an exam is available to you once the exam is published. You can also inspect individual submissions of all students who participated in the exam.qa
                              </dd>
                           </dl>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 p-3 bg-white border">
                     <h3>Tutorial</h3>
                     <iframe width="100%" height="auto" src="https://www.youtube.com/embed/OK_JCtrrv-c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
</html>