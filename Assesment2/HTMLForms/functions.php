<?php
require('database/DBController.php');


require('database/Products.php');
 

$db = new DBController();

$product = new Product($db);

// print data from database to page
// var_dump($product->getData());

function checkLogin($conn){
    if(isset($_SESSION['sellerID'])){
        $id = $_SESSION['sellerID'];

        $sql = "select * from Seller where sellerID = '$id' limit 1";

        $result = mysqli_query($conn, $sql);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($sql);

            return $user_data;
        }
    }

    //Redirect to login
    header("Location: login.php");
    die;
}

function randomNum($lenght){
    $text = "";

    if($lenght < 5){
        $lenght = 5;
    }

    $len = rand(4, $lenght);

    for($i = 0; $i < $len; $i++){
        $text .= rand(0,9);
    }

    return $text;
}

