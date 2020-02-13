<?php
    session_start();
    session_destroy();
    echo 'Logout successful ';
    header ("Refresh: 5,url=home.php");
?>