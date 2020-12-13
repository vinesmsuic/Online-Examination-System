<?php
        include "mysql-connect.php";

        //get Info from admin-view-info.php (admin-manage.js) 
        $originalID = $_POST['originalID'];
        $ID = $_POST['userid'];
        $nickName = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
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
            $targetDir = "../img/client/";
            $fileName = basename($_FILES["avatar"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if(!empty($_FILES["avatar"]["name"])){
                $statusMsg = '';
	            // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
                        $stmt = $connect->prepare("UPDATE users SET ID = ?, userType = ?, PW = ?, nickName = ?, email = ?, profileImage = ?, course = ?, gender = ?, birthday = ?, sQType = ?, sQAnswer = ? WHERE ID = ?");
                        $stmt->bind_param("sssssssssiss",$ID,$userType,$password,$nickName,$email,$fileName,$course,$gender,$birthday,$securityType,$securityAnswer,$originalID);
                        $valid = $stmt->execute();
                        if($valid){
                            $statusMsg = "success";
                            $connect->close();
                            header("Location: ../page/admin-system-management.php");
                            exit();
                        }else{
                            $statusMsg = "File upload failed, please change the file name or try again.";
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
        } else {
            $stmt = $connect->prepare("UPDATE users SET ID = ?, userType = ?, PW = ?, nickName = ?, email = ?, course = ?, gender = ?, birthday = ?, sQType = ?, sQAnswer = ? WHERE ID = ?");
            $stmt->bind_param("ssssssssiss",$ID,$userType,$password,$nickName,$email,$course,$gender,$birthday,$securityType,$securityAnswer,$originalID);
            $valid = $stmt->execute();
            if($valid){
                echo "success";
                $connect->close();
                header("Location: ../page/admin-system-management.php");
                exit();
            }else{
                echo "Failed.";
            }
        }
        

        $connect->close();
?>