<?php
session_start();

include_once('./functions.php');

$_SESSION= 'admin';

//check if session is admin
// var_dump($_SESSION);

//if is admin show admin page


//else go to login screen
// if(!isset)


foreach($admin->getAdminLogins() as $theAdmin){
    echo "<h3>Welcome to your business page! $theAdmin[businessName]</h3>";
}

?>