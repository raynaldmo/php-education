<?php
echo 'Running PHP ' . phpversion() . '<br>';

$a = 1;
$b = 0;
switch($a) {
    default:
        $b += 1;
        break;
    default:
        $b += 2;
}

echo '$b is ' . $b;