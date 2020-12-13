<?php
    include "mysql-connect.php";

    if (isset($_COOKIE["userID"])){
        $userID = $_COOKIE["userID"];
        $stmt = $connect->prepare("SELECT course, examDate, startTime, expireTime, remarks, maxScore, minScore, median, average FROM exams WHERE creator = ?");
        $stmt->bind_param("s",$userID);
        $valid = $stmt->execute();
	    if (!$valid){
	    	die("Could not successfully run query.". $connect->connect_error);
        }
    }
?>