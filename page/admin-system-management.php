<!DOCTYPE html>
<html>
   <head>
	  <?php include '../functionalphp/main-head.php';?>
	  <script src="../js/admin-manage.js"></script>
   </head>
   <body onload="showAccounts()">
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <p>Welcome, Admin!</p>
               <li class="active">
                  <a href="#">System Management</a>
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
                           <div class="nav-link active">Welcome! Admin</div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="../login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
			</nav>
			<div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 mx-auto">	  
               <h3>Manage Accounts</h3>
					<form id="account-form" method="post">
                  <div class="form-group">
                     <input type="button" value="Add a new teacher or student account" name="register" class="btn btn-block btn-primary" onclick="btnAdd();" />
                  </div>
						<div class="form-group">
						Select a student or teacher account to modify or delete: 
						<select class="form-control" id="account" name="account" onfocus="showAccounts()"></select>
						</div>
						<div class="form-group">
                        <input class="btn btn-block btn-info" name="manage" type="submit" onclick="btnModify();" value="Modify selected account"/>
                        <input class="btn btn-block btn-danger" name="manage" type="submit" onclick="btnDelete();" value="Delete selected account"/>
                    	</div>
					</form>
                  </div>
               </div>
			</div>
			<hr>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12 mx-auto">
                     <div id="all-info">
                     <?php include '../functionalphp/admin-view-info.php';?>
                     </div>
                  </div>
               </div>
			   </div>
         </div>
      </div>
   </body>
</html>