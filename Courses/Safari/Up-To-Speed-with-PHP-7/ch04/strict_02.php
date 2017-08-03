<?php
declare(strict_types=1);

require_once './strict_01.php';

$num = [18.6, 21.2, 16.5];

$avg = roundedAverage($num);
echo $avg . '<br>';

$total = addIntegers($avg, 12345);

// PHP built-in functions expect correct type when call is made in file
// with strict mode on
echo strrev($total);