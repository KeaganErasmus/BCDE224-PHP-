<?php
session_start(); 
require_once('../functions.php');
require_once('../database/DBController.php');
require_once('../database/connect.php');

$userName = $_POST['usersUsername'];
$password = $_POST['psw'];

$_SESSION['user'] = $userName;

if(isset($_POST['submit'])){


    //  MYSQL injection prevention
    $userName = stripslashes($userName);
    $password = stripslashes($password);
    $userName = mysqli_real_escape_string($con, $userName);
    $password = mysqli_real_escape_string($con, $password);
    $sql = "SELECT * FROM Users WHERE usersUsername like '$userName' and usersPsw like '$password'";

    $result = $con->query($sql);
    $row = $result->fetch_array(MYSQLI_NUM);
    $count = mysqli_num_rows($result);

    if($count === 1){   
        if(isset($_SESSION['user'])){
            header("Location: ../index.php");
        }
    }
    else{
        header("Location: ../login.php");
    }

}