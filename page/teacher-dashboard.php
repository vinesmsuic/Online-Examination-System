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
                <?php include '../functionalphp/get-nickname.php'; ?>
               <li class="active">
                  <a href="#">Dashboard</a>
               </li>
               <li>
                  <a href="teacher-release-exam.php">Releases an Exam</a>
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
                           <a class="nav-link" href="../functionalphp/logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>

            <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
		</div>
		<div class="col-md-6">
			<div class="jumbotron">
				<h2>
					Hello, world!
				</h2>
				<p>
                This is an online examination system where teachers can release an exam and evaluate the student's results, and students and take an exam.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
		</div>
	</div>
</div>

         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
</html>