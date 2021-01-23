<?php
        include "mysql-connect.php";

        //get Info from admin-view-info.php (admin-manage.js) 
        $originalID = $_POST['originalID'];
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
        $imgUpload = $_POST['imgUpload'];
        if ($imgUpload=="true"){
            // File upload path
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
                        $stmt = $connect->prepare("UPDATE users SET ID = ?, userType = ?, PW = ?, nickName = ?, email = ?, profileImage = ?, course = ?, gender = ?, birthday = ?, sQType = ?, sQAnswer = ? WHERE ID = ?");
                        $stmt->bind_param("sssssssssiss",$ID,$userType,$password,$nickName,$email,$fileName,$course,$gender,$birthday,$securityType,$securityAnswer,$originalID);
                        $valid = $stmt->execute();
                        if($valid){
                            $alert_message = "Account modified successfully.";
                            $link = "../page/admin-system-management.php";

                            echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
                        }else{
                            $statusMsg = "File upload failed, please change the file name or try again.";
                        }
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    //Alert admin that the file type is unaccepted
            
                    $alert_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload. Please modify the account again.";
                    $link = "../page/admin-system-management.php";
                
                    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
                
                }
            }else{
                $statusMsg = 'Please select a file to upload.';
            }
            // Display status message, rarely used
            echo $statusMsg;
        } else {
            $stmt = $connect->prepare("UPDATE users SET ID = ?, userType = ?, PW = ?, nickName = ?, email = ?, course = ?, gender = ?, birthday = ?, sQType = ?, sQAnswer = ? WHERE ID = ?");
            $stmt->bind_param("ssssssssiss",$ID,$userType,$password,$nickName,$email,$course,$gender,$birthday,$securityType,$securityAnswer,$originalID);
            $valid = $stmt->execute();
            if($valid){
                $alert_message = "Account modified successfully.";
                $link = "../page/admin-system-management.php";
                echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
                        
            }else{
                echo "Failed.";
            }
        }
        

        $connect->close();
?>