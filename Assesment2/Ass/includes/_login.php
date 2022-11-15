<?php
session_start(); 
require_once('../functions.php');
require_once('../database/DBController.php');
require_once('../database/connect.php');


$userName = $_POST['usersUsername'];
$password = $_POST['psw'];

$pswHash = password_hash($password, PASSWORD_DEFAULT);
$query="SELECT * FROM Users WHERE usersUsername like '$userName'";

$getPass1=$con->query($query);
$getPass2=$getPass1-> fetch_array();
$getPass=$getPass2['usersPsw'];


if(isset($_POST['submit'])){
    foreach($users->getUsersData('Users') as $theUser){
        if($theUser['usersUsername'] == $userName && $theUser['usersPsw'] == $getPass){
            $_SESSION['user'] = $userName;
        }
    }
    //  MYSQL injection prevention
    $userName = stripslashes($userName);
    $password = stripslashes($password);
    $userName = mysqli_real_escape_string($con, $userName);
    $password = mysqli_real_escape_string($con, $password);
    
    $sql = "SELECT * FROM Users WHERE usersUsername like '$userName' and usersPsw like '$theUser[usersPsw]'";

    $result = $con->query($sql);
    $row = $result->fetch_array(MYSQLI_NUM);
    $count = mysqli_num_rows($result);
  
    if(isset($_SESSION['user'])){
        header("Location: ../index.php");
    }
    else{
        header("Location: ../login.php");
    }

}