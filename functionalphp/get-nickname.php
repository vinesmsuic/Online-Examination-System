<?php
    if (isset($_COOKIE["nickName"])){
        echo '<p>Welcome! '. $_COOKIE["nickName"]. '</p>';
    }
    else
    {
        echo "<p>Welcome! User</p>";
    }
?>