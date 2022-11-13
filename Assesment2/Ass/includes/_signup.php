<?php
session_start();
include('../database/connect.php');

$userName   = $_REQUEST['uid'];
$email      = $_REQUEST['email'];
$password   = $_REQUEST['psw'];
$userType   = $_REQUEST['acc-type'];

// insert into seller table
if($userType == "seller"){
    $sql = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$password', '$email', '$userType')";
}
// insert into buyer table
if($userType == "buyer"){
    $sql = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$password', '$email', '$userType')";
}

if(mysqli_query($con, $sql)){
    header("location: ../index.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}