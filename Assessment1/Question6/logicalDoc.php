<?php
$a = random_int(0, 10);
$b = random_int(0, 10);
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}
echo "<br/>";
echo "num 1" . $a . " num 2" . $b;
?>