<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["type"])){
        if ($_SESSION["type"] != $_SESSION["pageType"]){
            $alert_message = "You cannot access this page using your account!";
            $link = "../login.html";
            echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ if ('".$_SESSION["type"]."'=='admin'){ window.location.href = '../page/admin-system-management.php';} else if ('".$_SESSION["type"]."'=='student'){ window.location.href = '../page/student-dashboard.php';} else if ('".$_SESSION["type"]."'=='teacher'){ window.location.href = '../page/teacher-dashboard.php';}  }, 0);</script>";
        }
    } else {
        $alert_message = "Your login period has expired! Please login again!";
        $link = "../login.html";
        echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
    }
?>