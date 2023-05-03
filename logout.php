<?php
    session_start();
    session_destroy();
    header("Location: indx.php");
    exit();
?>