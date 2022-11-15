<?php
session_start();
include('../database/connect.php');
include('../functions.php');

$productCode        = $_REQUEST['productCode'];
$productName        = $_REQUEST['productName'];
$productImage       = $_REQUEST['productImage'];
$productDescription = $_REQUEST['productDescription'];
$productPrice       = $_REQUEST['productPrice'];

// Insert Product into Product tabel
$sql = "INSERT INTO Product (productCode, productName, productPrice, productImage, productDescription) 
        VALUES('$productCode', '$productName', '$productPrice', '../Ass/img/$productImage', '$productDescription')";

var_dump($users);

if(mysqli_query($con, $sql)){
    setcookie("productCode", $productCode);
    header("location: _listingInsert.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}