<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location: login.php");
}
//include header.php file
include('header.php');

//include main.php file
include('main.php');

//include footer.php file
include('footer.php');

?>