<?php
require('database/DBController.php');

// require the data base tables
require('database/Products.php');
require('database/Users.php');
 
// Create database object
$db = new DBController;

// creating objects of the tables
$product = new Product($db);
$users = new Users($db);

// print data from database to page
// var_dump($users->getUsersData());