<?php
include('../classes/signupController.php');

if(isset($_POST["submit"])){

    // Grab date
    $uid = $_POST["uid"];
    $email = $_POST["email"];
    $psw = $_POST["psw"];
    $psw_repeat = $_POST["psw-repeat"];
    $acc_type = $_POST["acc-type"];

    // Instansiate Signup controller
    $sigup = new SignupController();

    // Error handling

    // go to index page
}