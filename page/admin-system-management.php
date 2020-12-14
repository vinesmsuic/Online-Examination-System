<!DOCTYPE html>
<html>
   <head>
     <?php include '../functionalphp/main-head.php';?>
	  <script src="../js/admin-manage.js"></script>
   </head>
   <body onload="Timeout();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "admin-sidebar.php";?>
         <!-- Page Content  -->
         <div id="content">
            <?php include "main-navtop.php";?>
         <!--
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
         -->
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12 mx-auto">
                     <div id="all-info">
                        <div class="form-group">
                           <input type="button" value="Add a new teacher or student account" name="register" class="btn btn-block btn-primary btn-lg" onclick="btnAdd();" />
                        </div>
                        <form action="../page/admin-modify-account.php " method="post" id="modify">
                           <?php include '../functionalphp/admin-view-info.php';?>
                           <input type="hidden" id="targetID" name="targetID" value="" />
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