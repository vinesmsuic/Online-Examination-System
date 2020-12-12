<?php
    if (isset($_COOKIE["type"])){
        //renew timer
        echo $_COOKIE["type"];
    } else {
        echo "not logged.";
    }
?>