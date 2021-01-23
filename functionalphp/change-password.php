<?php
    include "mysql-connect.php";
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ID = $_POST['userid'];
    $stmt = $connect->prepare("UPDATE users SET PW = ? WHERE ID = ?");
    $stmt->bind_param("ss",$password,$ID);
    $valid = $stmt->execute();
    if (!$valid){
        die("Could not successfully run query.". $connect->connect_error);
    }
    $alert_message = "You have changed your password successfully! You will be redirected in a few seconds.";
    $link = "../login.html";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
    $connect->close();
?>
                        