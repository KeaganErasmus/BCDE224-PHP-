<?php
// include_once('./database/DBController.php');
$productCode = $_GET['productCode'];

$sql = "SELECT productImage FROM Product WHERE productCode=$productCode";
$result = mysql_query("$sql");
$row = mysql_fetch_assoc($result);
mysql_close($link);

header("Content-type: image/jpeg");
echo $row['Products'];