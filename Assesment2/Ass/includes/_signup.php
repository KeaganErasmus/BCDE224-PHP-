<?php
session_start();
include('../database/connect.php');

$userName   = $_REQUEST['uid'];
$email      = $_REQUEST['email'];
$password   = $_REQUEST['psw'];
$userType   = $_REQUEST['acc-type'];

$sql = "INSERT INTO Users (usersUsername, usersPsw, usersEmail, userType) VALUES('$userName', '$password', '$email', '$userType')";

if(mysqli_query($con, $sql)){
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";

    echo nl2br("\n$userName\n $email\n "
        . "$password\n $userType");

    header("location: ../index.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}