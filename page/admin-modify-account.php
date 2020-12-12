<!DOCTYPE html>
<html>
   <head>
      <?php include '../functionalphp/registration-head.php';?>
      <?php include '../functionalphp/main-head.php';?>
	  <script src="../js/admin-modify.js"></script>
   </head>
   <body onload="InfoSet('<?php echo $_POST['targetID'];?>');">
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <h3>Online Examination System</h3>
            </div>
            <ul class="list-unstyled components">
               <p>Welcome, Admin!</p>
               <li class="active">
                  <a href="../page/admin-system-management.php">System Management</a>
               </li>
            </ul>
         </nav>
         <!-- Page Content  -->
         <div id="content">
            <div class="container login-container">
                <div class="row">
                    <div class="mx-auto">
                        <h3>Modify account</h3>
                        <h6 id="message"></h6>
                        <form class="form" action="../functionalphp/admin-modify-account.php " method="post" enctype="multipart/form-data" autocomplete="off " id="registerForm">
                            <input type="hidden" name="usertype" id="usertype" value="" />
                            <input type="hidden" name="originalID" id="originalID" value="" />
                            <input type="hidden" name="imgUpload" id="imgUpload" value="false" />
                            <div class="error-message" id="errorMessage1"></div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="User ID * " name="userid" id="userID" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nickname * " name="nickname" id="nickName"required />
                            </div>
                            <div class="error-message" id="errorMessage2"></div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email * " name="email" id="email" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control " placeholder="Password * " name="password" autocomplete="new-password" id="password" required />
                            </div>
                            <div class="form-group " id="avatarSpace">
                                <label>Current profile image: </label>
                                <div id="imagedisplay"></div>
                                <input type="button" value="Change" class="btn-primary" onclick="ChangeImage();" />
                            </div>
                            <div id="studentform" hidden>
                                <div class="form-group">
                                    <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Your Birthday * " required/></div>
                                <div class="form-group" style="text-align: center; width: auto;">
                                    <input type="radio" id="male" name="gender" value="M">
                                    <label for="male">Male&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                    <input type="radio" id="female" name="gender" value="F">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div id="teacherform" hidden>
                                <div class="form-group">
                                    <div class="error-message" id="errorMessage3"></div>
                                    <label for="">Course code: </label>
                                    <div id="course1space">
                                        <input type="text" class="form-control" placeholder="Course * " name="course1" id="course1" required /></br>
                                        <div id="course2space"></div>
                                    </div>
                                    <input type="hidden" name="CourseNum" id="coursenum" value="1" />
                                    <input type="button" value="Add New..." id="morecourse" class="btn btn-primary" onclick="MoreCourse();" />
                                    <input type="button" value="Reset" id="resetcourse" class="btn btn-primary" onclick="ResetCourse();" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="error-message" id="errorMessage4"></div>
                                <label>Select a security question: </label><select name="securityType" id="security">
                                    <option value="1">Where do you live?</option>
                                    <option value="2">What game do you like?</option>
                                    <option value="3">Who is your favorite athelete?</option>
                                    <option value="4">What is the name of your father?</option>
                                    <option value="5">What is your dream?</option>
                                  </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Answer * " id="securityAnswer" name="securityAnswer" required />
                            </div>
                            <div>
                                <input type="button" value="Modify" class="btn btn-block btn-primary" onclick="Modify();" />
                            </div>
                            <input type="Submit" id="submit" hidden />
                        </form>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </body>
   <?php include '../functionalphp/main-foot.php';?>
</html>