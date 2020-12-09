<?php
    if (isset($_COOKIE["type"])){
        echo $_COOKIE["type"];
    } else {
        echo "not logged."
    }
?>