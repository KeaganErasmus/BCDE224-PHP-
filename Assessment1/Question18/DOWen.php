<?php
$ini_array = parse_ini_file( 'messages.ini', true);

foreach($ini_array['en'] as $value)
{
	echo "<br>$value<br>";
}