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
                     <div class="row">
                        <div class="col-md-6 pt-3 bg-white border">
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
                        <div class="col-md-6 pt-3 bg-white border">
                           <blockquote class="blockquote">
                              <p class="mb-0" id="motivation"></p>
                              <footer class="blockquote-footer" id="motivation-footer"></footer>
                           </blockquote>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail First" src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail Second" src="https://www.layoutit.com/img/city-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="card">
                                    <img class="card-img-top" alt="Bootstrap Thumbnail Third" src="https://www.layoutit.com/img/sports-q-c-600-200-1.jpg" />
                                    <div class="card-block">
                                       <h5 class="card-title">
                                          Card title
                                       </h5>
                                       <p class="card-text">
                                          Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                       </p>
                                       <p>
                                          <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
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