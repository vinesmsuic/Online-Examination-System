<?php
        include "mysql-connect.php";
        
        //Get values from registration.php form
        $ID = $_POST['userid'];
        $nickName = $_POST['nickname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userType = $_POST['usertype'];
        if ($userType=="student"){
            $course = NULL;
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
        } else {
            $courseNum = intval($_POST['CourseNum']);
            $course = "";
            for ($i = 1; $i <= $courseNum; $i++){
                $course = $course.$_POST['course'.$i].",";
            }
            $course = substr($course, 0, -1);
            $gender = NULL;
            $birthday = NULL;
        }
        $securityType = intval($_POST['securityType']);
        $securityAnswer = $_POST['securityAnswer'];

        
        // File upload path
        // Max: Need to create a new folder for storing images - e.g. ../img/client
        $temp = explode(".", $_FILES["avatar"]["name"]);
        $fileName = $ID . '.' . end($temp);
        $targetFilePath = "../img/client/" . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["avatar"]["name"])){
            $statusMsg = '';
	        // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                //overwrite file if existed
                if(file_exists($targetFilePath)) {
                    unlink($targetFilePath);
                }
                // Upload file to server
                if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    /*
                    $Query = "INSERT into users (ID, userType, PW, nickName, email, profileImage, course, gender, birthday) VALUES ('$ID'.'$userType','$password','$nickName','$email','$fileName','$course','$gender','$birthday')";
                    $insert = mysqli_connect($connect,$Query);
                    if($insert){
                        $statusMsg = "success";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } */
                    $stmt = $connect->prepare("INSERT into users (ID, userType, PW, nickName, email, profileImage, course, gender, birthday, sQType, sQAnswer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssssis",$ID,$userType,$password,$nickName,$email,$fileName,$course,$gender,$birthday,$securityType,$securityAnswer);
                    $valid = $stmt->execute();
                    if($valid){
                    
                        $accFrom = $_POST['source'];

                        //Alert User that an account has been created
                        $alert_message = "Registration Successful! You will be redirected in a few seconds.";

                        if($accFrom == "admin")
                        {
                            $link = "../page/admin-system-management.php";
                        }
                        else
                        {
                            $link = "../login.html";
                        }

                        //Direct to different page according to user account type (Workaround)
                        echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
                        
                    }else{
                        $statusMsg = "File upload failed, please change the file name or try again.";
                    }
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $accFrom = $_POST['source'];

                //Alert User that the file is unaccepted
               
                if($accFrom == "admin")
                {
                    $alert_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload. Please modify the account again.";
                    $link = "../page/admin-system-management.php";
                }
                else
                {
                    $alert_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload. Please register again.";
                    $link = "../page/registration.php";
                }
                //Direct to different page according to user account type (Workaround)
                echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
                        
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }
        // Display status message, this is rarely as mostly the user would encounter no problem or only upload the wrong file type
        
        echo $statusMsg;

        $connect->close();
?>