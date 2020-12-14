<!DOCTYPE html>
<html>
   <head>
        <?php include '../functionalphp/main-head.php';?>
	  <script src="../js/registration.js"></script>
   </head>
   <body onload="Timeout(); StudentForm();">
      <div class="wrapper">
         <!-- Sidebar  -->
         <?php include "admin-sidebar.php";?>
         <!-- Page Content  -->
         <div id="content">
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h3>Create an account</h3>
                        <form class="form" action="../functionalphp/add-account.php " method="post" enctype="multipart/form-data" autocomplete="off " id="registerForm">
                            <div class="form-group btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary" id="studentac">
                                    <input type="radio" name="usertype" id="option1" value="student" autocomplete="off" onclick="StudentForm();" checked/>
                                    Student Account
                                </label>
                                <label class="btn btn-secondary active" id="teacherac">
                                    <input type="radio" name="usertype" id="option2" value="teacher" autocomplete="off" onclick="TeacherForm();" />
                                    Teacher Account
                                </label>
                            </div>
                            <div class="error-message" id="errorMessage1"></div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="User ID * " name="userid" id="userID" required />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nickname * " name="nickname" required />
                            </div>
                            <div class="error-message" id="errorMessage2"></div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email * " name="email" id="email" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control " placeholder="Password * " name="password" autocomplete="new-password" id="password" required />
                            </div>
                            <div class="error-message" id="errorMessage3"></div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password * " name="confirmpassword" autocomplete="new-password" id="confirmPassword" required />
                            </div>
                            <div class="form-group ">
                                <label>Upload the profile image: </label><input type="file" class="form-control-file" name="avatar" accept="image/*" required />
                            </div>
                            <div id="studentform">
                                <div class="form-group">
                                    <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Your Birthday * " required/></div>
                                <div class="form-row form-group" style="text-align: center; width: auto;">
                                    <div class="col">
                                    <input type="radio" id="male" name="gender" value="M" checked="checked">
                                    <label for="male">Male</label>
                                    </div>
                                    <div class="col">
                                    <input type="radio" id="female" name="gender" value="F">
                                    <label for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div id="teacherform">
                                <div class="form-group">
                                    <div class="error-message" id="errorMessage4"></div>
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
                            <div class="error-message" id="errorMessage5"></div>
                            <div class="form-row form-group">
                              <div class="col">
                                <label>Select a security question: </label>
                              </div>
                              <div class="col">
                                <select class="form-control" name="securityType" id="security">
                                    <option value="-1" selected disabled hidden></option>
                                    <option value="1">Where do you live?</option>
                                    <option value="2">What game do you like?</option>
                                    <option value="3">Who is your favorite athelete?</option>
                                    <option value="4">What is the name of your father?</option>
                                    <option value="5">What is your dream?</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Answer * " name="securityAnswer" required />
                            </div>
                            <div>
                                <input type="button" value="Register" name="register" class="btn btn-block btn-primary" onclick="Register();" />
                            </div>
                            <input type="hidden" name="source" value="admin" hidden />
                            <input type="Submit" id="submit" hidden />
                        </form>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </body>
</html>