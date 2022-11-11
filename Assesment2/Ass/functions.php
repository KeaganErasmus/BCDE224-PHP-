<?php
require('database/DBController.php');


require('database/Products.php');
 

$db = new DBController();

$product = new Product($db);

// print data from database to page
// var_dump($product->getData());