<?php

// $mysqli = mysqli_connect("example.com", "user", "password", "database");

// $result = mysqli_query($mysqli, "SELECT 'A world full of ' AS _msg FROM DUAL");
// $row = mysqli_fetch_assoc($result);
// echo $row['_msg'];

$mysqli = new mysqli("example.com", "user", "password", "database");

$result = $mysqli->query("SELECT 'choices to please everybody.' AS _msg FROM DUAL");
$row = $result->fetch_assoc();
echo $row['_msg'];