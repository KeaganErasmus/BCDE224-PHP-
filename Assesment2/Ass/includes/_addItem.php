<?php
session_start();
include('../database/connect.php');

$productCode        = $_REQUEST['productCode'];
$productName        = $_REQUEST['productName'];
$productImage       = $_REQUEST['productImage'];
$productDescription = $_REQUEST['productDescription'];
$productPrice       = $_REQUEST['productPrice'];

// Insert Product into Product tabel
$sql = "INSERT INTO Product (productCode, productName, productPrice, productImage, productDescription) VALUES('$productCode', '$productName', '$productPrice', '$productImage', '$productDescription')";

if(mysqli_query($con, $sql)){
    header("location: ../seller.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}
