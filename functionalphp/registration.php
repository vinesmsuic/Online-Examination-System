<?php
		include "mysql-connect.php";
        $ID = $_POST['userid'];
        $nickName = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password']; //assume checked
        if ($_POST['options']=="option1"){//check userType and record the data, set the not used ones as NULL
            $userType = "student";
            $course = NULL;
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
        } else {
            $userType = "teacher";
            $course = $_POST['course'];
            $gender = NULL;
            $birthday = NULL;
        }
        // File upload path
        $targetDir = "../img/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
            $statusMsg = '';
	        // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    /*
                    $Query = "INSERT into users (ID, userType, PW, nickName, email, profileImage, course, gender, birthday) VALUES ('$ID'.'$userType','$password','$nickName','$email','$fileName','$course','$gender','$birthday')";
                    $insert = mysqli_connect($connect,$Query);
                    if($insert){
                        $statusMsg = "success";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    } */
                    $stmt = $connect->prepare("INSERT into users (ID, userType, PW, nickName, email, profileImage, course, gender, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssss",$ID,$userType,$password,$nickName,$email,$fileName,$course,$gender,$birthday);
                    $valid = $stmt->execute();
                    if($valid){
                        $statusMsg = "success";
                    }else{
                        $statusMsg = "File upload failed, please try again.";
                    }
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
            }
        }else{
            $statusMsg = 'Please select a file to upload.';
        }
        // Display status message
        echo $statusMsg;

        $connect->close();
?>