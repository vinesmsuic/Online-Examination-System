<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/main-head.php';?>
   </head>
   <body>
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <li class="">
                  <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                     <li>
                        <a href="#">Home 1</a>
                     </li>
                     <li>
                        <a href="#">Home 2</a>
                     </li>
                     <li>
                        <a href="#">Home 3</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="#">About</a>
               </li>
               <li>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                     <li>
                        <a href="#">Page 1</a>
                     </li>
                     <li>
                        <a href="#">Page 2</a>
                     </li>
                     <li>
                        <a href="#">Page 3</a>
                     </li>
                  </ul>
               </li>
               <li >
                  <a href="#">Releases an Exam</a>
               </li>
               <li class="active">
                  <a href="#">View Student's Exam</a>
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
                     <h3>
                        Exam Details
                     </h3>
                     <form role="form">
                        <div class="form-group">
                           <label for="course-name">Course Name:</label><input type="text" class="form-control" id="coursename" />
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">
                           Start Time
                           </label>
                           <input type="time" id="appt" name="appt">
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">
                           End Time
                           </label>
                           <input type="time" id="appt" name="appt">
                        </div>
                        <button type="submit" class="btn btn-primary">
                        Create Exam
                        </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>