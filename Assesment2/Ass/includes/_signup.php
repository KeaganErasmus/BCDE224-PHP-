<?php
session_start();
include('../database/connect.php');

$userName   = $_REQUEST['uid'];
$email      = $_REQUEST['email'];
$password   = $_REQUEST['psw'];
$userType   = $_REQUEST['acc-type'];

$hash = password_hash($password, PASSWORD_DEFAULT);

// insert into seller table
if($userType == "seller"){
    // $sql = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$password', '$email', '$userType')";
    $stmt = "INSERT INTO Seller (sellerFName, sellerEmail) VALUES('$userName', '$email')";
    mysqli_query($con, $stmt);
}
// insert into buyer table
if($userType == "buyer"){
    $stmt = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$hash', '$email', '$userType')";
}

$sql = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$hash', '$email', '$userType')";

if(mysqli_query($con, $sql)){
    header("location: ../index.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}