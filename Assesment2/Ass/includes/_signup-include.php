<?php
session_start();
include('../database/DBController.php');

if(isset($_POST["submit"])){
    // Grab data
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $psw_repeat = $_POST["psw-repeat"];

    // Instansiate Signup controller
    
    // Error handling
    // go to index page
    // header("location: ../index.php?error=null");
    echo $uid . $email . $psw . $psw_repeat;
}