<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_unset();
    session_destroy();
    $alert_message = "You have logged out!";
    $link = "../login.html";
    echo "<script type='text/javascript'>alert('$alert_message'); window.setTimeout(function(){ window.location.href = '$link'; }, 0);</script>";
?>