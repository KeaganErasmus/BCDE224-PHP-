<?php

// do often at top of any script that talks to database
require_once('MySQLDB.php');

$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'passworddemo';

$db = new MySQL($host, $dbuser, $dbpass, $dbname);
$db->createDatabase(); // only once!
$db->selectDatabase(); // every script


//---------------------
// build ONCE ONLY
$sql = "drop table if exists password";
$result = $db->query($sql);

$sql = "create table if not exists password ( username varchar(50), hash varchar(250) )";
$result = $db->query($sql);

//-----------------------------------------------
// register new users
$username = 'DonaldTrump';
$password = '1234';
$login = $username . $password;
$hash = password_hash($login, PASSWORD_DEFAULT);

$sql = "insert into password  values ( '$username', '$hash')";
echo "<br>$sql<br>";
$result = $db->query($sql);

$username = 'MickeyMouse';
$password = 'abcd';
$login = $username . $password;
$hash = password_hash($login, PASSWORD_DEFAULT);

$sql = "insert into password  values ( '$username', '$hash')";
echo "<br>$sql<br>";
$result = $db->query($sql);

// ---------------------------------
// admin only -check user database

$sql = "select * from password";
$result = $db->query($sql);
$size = $result->size();
echo "<br>$size<br>"; // MIGHT BE SHOWN TO USERS


// DO NOT DO THIS - IF YOUR DATABASE IS HACKED THIS IS WHAT THEY GET
// yeah
while ($row = $result->fetch()) 
{
	var_dump($row);
	echo '<br>';
	$username = $row['username'];
	$hash = $row['hash'];
	echo "<br>$username  $hash<br>";
}
// ------------------------------
// validate login 

$username = 'DonaldTrump';
$password = '1234';
$sql = "select * from password where username='$username'";
echo "<br>$sql<br>";
$result = $db->query($sql);
$size = $result->size();
echo "<br>$size<br>"; 
//var_dump($result);
echo "<br>";
$row = $result->fetch();
$hash = $row['hash'];
echo "<br>$hash<br>";
$login = $username . $password;
if (password_verify($login, $hash))
{
	echo 'login is valid<br>';
}
else
{
	echo 'login failed!<br>';
}








