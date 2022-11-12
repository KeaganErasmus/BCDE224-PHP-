<?php
include('../database/DBController.php');
include('../classes/_signup.php');
include('../classes/signupController.php');

if(isset($_POST["submit"])){

    // Grab data
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $psw_repeat = $_POST["psw-repeat"];

    echo $uid . $email . $psw . $psw_repeat;
    // Instansiate Signup controller
    $signup = new SignupController($uid, $psw, $psw_repeat, $email);

    // Error handling
    $signup->signupUser();
    // go to index page
    header("location: ../index.php?error=null");
}