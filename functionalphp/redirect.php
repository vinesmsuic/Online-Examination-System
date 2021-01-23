<?php
    if (isset($_SESSION["type"])){
//       setcookie("type", $_COOKIE["type"], time() + 21600, "/");
//       setcookie("userID", $_COOKIE["userID"], time() + 21600, "/");
//       setcookie("nickName", $_COOKIE["nickName"], time() + 21600, "/");
        echo $_SESSION["type"];
    } else {
        echo "not logged.";
    }
?>
