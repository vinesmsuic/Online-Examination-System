<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Make the page responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Online Examination System - Forget Password</title>

    <!-- Our own css-->
    <link rel="stylesheet" href="../css/login.css">
    
    <!-- Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!-- jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/70f9c4154a.js" crossorigin="anonymous"></script>

    <!-- Our own js-->
    <script src="../js/forget-password.js"></script>

</head>

<body class="jumbotron vertical-center">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form mx-auto">
                <h3>Forgot Your Password?</h3>
                <h6>Change your password by following the procedure.</h6>
                <form class="form" action="../functionalphp/change-password.php " method="post" enctype="multipart/form-data" autocomplete="off " id="changePassword">
                <div id="DialogBox1">
                    <div class="error-message" id="errorMessage1"></div>
                    <label for="">Enter Your User ID:</label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your User ID *" name="userid" id="userID" />
                    </div>
                    <input type="button" value="Confirm" class="btn btn-block btn-primary" onclick="GetQuestion();" />
                </div>
                <div id="DialogBox2" hidden>
                    <div class="error-message" id="errorMessage2"></div>
                    <label for="">Please answer the following security question:</br>
                        <div id="question"></div></label>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Answer *" id="answer" />
                    </div>
                    <input type="button" value="Confirm" class="btn btn-block btn-primary" onclick="CheckAnswer();" />
                    <input type="hidden" id="sampleAnswer" />
                    <input type="hidden" id="questionType" />
                </div>
                <div id="DialogBox3" hidden>
                    <div class="error-message" id="errorMessage3"></div>
                    <label for="">Please enter a new password for your account:</label>
                    <div class="form-group">
                        <input type="password" class="form-control " placeholder="Password * " name="password" autocomplete="new-password" id="password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password * " autocomplete="new-password" id="confirmPassword" />
                    </div>
                    <input type="button" value="Confirm" class="btn btn-block btn-primary" onclick="ChangePassword();" />
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>