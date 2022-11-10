Example: 1

<?php
//echo $exp =time()+0;
$t=time();
echo($t . "<br>");
echo(date("Y-m-d",$t));
//setcookie("name","Amit");
?> 
	
Example: 2
<?php

$exp =time()+86400;
setcookie("name","Amit",$exp);
?>  

Example: 3
<?php
echo $_COOKIE['name'];
?>  

Example: 4
<?php
$exp =time()+86400;
setcookie("password","cookie",$exp);
?> 

Example: 5
<?php
$exp =time()+86400;
echo $_COOKIE['password'];
?> 

Example: 6
<?php
$exp =time()+86400;
echo $_COOKIE['name']." and ".$_COOKIE['password'];
?> 

Example: 7
<?php
$exp =time()+86400;
print_r($_COOKIE);
?> 