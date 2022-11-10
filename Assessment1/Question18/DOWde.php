<?php
$ini_array = parse_ini_file( 'messages.ini', true);
//var_dump($ini_array);
$locale = 'de';
foreach($ini_array[$locale] as $value)
{
	echo "<br>$value<br>";
}