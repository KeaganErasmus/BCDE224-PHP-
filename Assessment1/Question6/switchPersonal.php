<?php

$number = random_int(0, 10);

switch($number){
    case ($number % 2) == 0:
        echo "EVEN<br/>";
        break;
    case ($number % 2) != 0:
        echo "ODD<br/>";
        break;
    
    default:
        echo "Not a valid input (Numbers only)";
        break;
}

echo $number;
?>