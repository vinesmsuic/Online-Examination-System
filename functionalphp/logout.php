<?php
    if (isset($_COOKIE["type"])){
        setcookie("type", $_COOKIE["type"], time() - 21600, "/");
    }
    if (isset($_COOKIE["userID"])){
        setcookie("userID", $_COOKIE["userID"], time() - 21600, "/");
    }
    if (isset($_COOKIE["nickName"])){
        setcookie("nickName", $_COOKIE["nickName"], time() - 21600, "/");
    }
    $alert_message = "You have logged out!";
    $link = "../login.html";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
?>