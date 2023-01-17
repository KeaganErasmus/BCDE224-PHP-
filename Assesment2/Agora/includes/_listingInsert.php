<?php 
include("../functions.php");
include("../database/connect.php");

var_dump($_COOKIE);
var_dump($_SESSION);


$productCode = $_COOKIE['productCode'];
$sellerID = $_COOKIE['sellerID'];

$sql = "INSERT INTO Listing (productCode, sellerID)
        VALUES ('$productCode', '$sellerID')";

if(mysqli_query($con, $sql)){
    header("location: ../seller.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}