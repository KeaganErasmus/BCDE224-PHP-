<?php
/**
 * In this case, we want to increase the default cost for BCRYPT to 12.
 * Note that we also switched to BCRYPT, which will always be 60 characters.
 */
$password ="rasmuslerdorf"; 
$options = [
    'cost' => 12,
];
echo $password . '<br>';
echo password_hash($password, PASSWORD_BCRYPT, $options);
?>