<?php
include "lib/interfaces.php";
include "lib/database.php";
try {
	$db = new Database ("localhost","root","","");
	$sqlList=array(
		'drop database if exists playDatabase;',
		'create database playDatabase',
		'use playDatabase;',
		'create table people (
			personID int not null auto_increment,
			givenName varchar(40),
			familyName varchar(40),
			primary key (personID)
			);',
		"insert into people (givenName, familyName) values ('Mike','Lopez');",
		"insert into people (givenName, familyName) values ('Mike','Lance');",
		"insert into people (givenName, familyName) values ('Amit','Sarkar');",
		"insert into people (givenName, familyName) values ('Rob','Oliver');",
		"insert into people (givenName, familyName) values ('Luofeng','Xu');"
		);
	
	$nRows = $db->executeBatch($sqlList);
	echo "$nRows rows affected by schema creation<br/>";
	echo '<br/>Here are the people after the first five have been loaded:<br/><br/>';
	showPeople($db);
	
} catch ( Exception $ex) {
	echo 'Exception: '.$ex->getMessage();
}

// test of transaction
// (1) with a problem
try {
	$db->beginTransaction();
	$db->execute("insert into people (givenName, familyName) values ('Mehdi','Asgarkhani');");
	$db->execute("insert into people (givenName, familyName) values ('John','McPhee');");
	throw new Exception ("Testing an exception"); // This will stop us reaching the commit
	$db->commitTransaction();
} catch (Exception $ex) {
	$db->rollbackTransaction();
}
echo '<br/>Here are the people after adding with a rollback:<br/><br/>';
showPeople($db);

// (2) With no problem
try {
	$db->beginTransaction();
	$db->execute("insert into people (givenName, familyName) values ('Mehdi','Asgarkhani');");
	$db->execute("insert into people (givenName, familyName) values ('John','McPhee');");
	$db->commitTransaction();
} catch (Exception $ex) {
	$db->rollbackTransaction();
}
echo '<br/>Here are the people after adding and committing:<br/><br/>';
showPeople($db);


function showPeople($db) {
	
	$rows=$db->query("select givenName, familyName from people order by familyName");
	foreach ($rows as $row) {
		$givenName=$row['givenName'];
		$familyName=$row['familyName'];
		echo "$givenName $familyName<br/>";
	}
}