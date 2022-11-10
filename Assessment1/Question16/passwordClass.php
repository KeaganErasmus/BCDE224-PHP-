<?php

// https://en.wikipedia.org/wiki/Warrant_canary

// https://wiki.php.net/rfc/password_hash

// http://php.net/manual/en/faq.passwords.php

// http://php.net/manual/en/function.password-hash.php


$username = 'DonaldTrump';
$password = '1234';

$login = $username . $password;
$hash = password_hash($login, PASSWORD_DEFAULT);
echo "$login  $hash<br>";

$password = '12345';
$login = $username . $password;
$hash = password_hash($login, PASSWORD_DEFAULT);
echo "$login  $hash<br>";

echo strlen($hash);