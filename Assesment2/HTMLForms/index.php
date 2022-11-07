<?php
session_start();
include_once('functions.php');

$user_data = checkLogin($conn);

//include header.php file
include('header.php');



 //include main.php file
 include('main.php');



 //include footer.php file
 include('footer.php');

?>

