<?php
$a = 1234; // decimal number
echo $a . "<br>";

$a = 0123; // octal number (equivalent to 83 decimal)
echo $a . "<br>";

// this doesnt work as we are using php 7 $a = 0o123; // octal number (as of PHP 8.1.0)

$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
echo $a . "<br>";

$a = 0b11111111; // binary number (equivalent to 255 decimal)
echo $a . "<br>";

$a = 1_234_567; // decimal number (as of PHP 7.4.0)
echo $a . "<br>";

?>