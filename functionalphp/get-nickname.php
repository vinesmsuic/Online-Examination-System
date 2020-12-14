<?php
    if (isset($_COOKIE["nickName"])){
        echo '<p>Welcome! '. $_COOKIE["nickName"]. '</p>';

        include "mysql-connect.php";
        $ID = $_COOKIE["userID"];
        $getImage = $connect->prepare("SELECT profileImage FROM users WHERE ID = ?");
        $getImage->bind_param("s",$ID);
        $valid = $getImage->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
        $result = $getImage->get_result();
        $row = $result->fetch_assoc();
        
        $imgPath = '../img/client/'. $row['profileImage'];

        echo '<div class="container-fluid p-2 pl-3"><img style="max-height:200px;" src=' . $imgPath . ' alt="" class="img-fluid img-thumbnail mx-auto rounded"></div>';

        $connect->close();
    }
    else
    {
        echo "<p>Welcome! User</p>";
    }
?>