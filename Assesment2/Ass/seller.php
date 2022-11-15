<?php
session_start();
include_once('header.php')
?>

<?php
include('template/_seller.php');
var_dump($_COOKIE);
var_dump($_SESSION);
?>

<?php
include('footer.php')
?>