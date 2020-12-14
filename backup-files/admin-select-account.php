<?php

    include "mysql-connect.php";

    $userQuery = "SELECT ID FROM users WHERE userType='student' OR userType='teacher' ";

    $result = mysqli_query($connect, $userQuery);
    if(!$result){
    die("Could not successfully run query.");
    }

    if (mysqli_num_rows($result) == 0){
    print "No Account yet!";
    }
    else
    {
        $IDs = array();
        while( $row = mysqli_fetch_assoc($result) ){
            $IDs[] = $row['ID'];
        }

        echo "<option value =''> </option>";

        foreach ($IDs as $IDs){
            echo "<option value ='$IDs'> $IDs </option>";
        }

    }


?>