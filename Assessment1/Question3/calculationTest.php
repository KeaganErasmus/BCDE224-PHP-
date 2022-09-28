<?php
require "calculation.php";

$calc = new Calculation;

$calc->num1 = 10;
$calc->num2 = 10;

echo $calc->add();
?>