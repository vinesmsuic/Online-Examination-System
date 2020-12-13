<?php

    include "mysql-connect.php";

    //get Info from admin-view-info.php (admin-manage.js) 
    $account = $_GET['enterID'];

    if($account != ""){
        $stmt = $connect->prepare("DELETE FROM users WHERE ID = ?");
        $stmt->bind_param("s", $account);
        $valid = $stmt->execute();

        if (!$valid)
        {
	    	die("Could not successfully run query.". $connect->connect_error);
        }
    }
?>