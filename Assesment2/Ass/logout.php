<?php 
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    setcookie("sellerID", "");
    header("Location: login.php");
