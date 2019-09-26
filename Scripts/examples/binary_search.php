#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function binary_search(array $arr, int $guess) : ?int {
 $low = 0;
 $high = count($arr) - 1;

 while ($low <= $high) {
   $mid = (int)(($low + $high)/2);

   $val = $arr[$mid];
   // print "$low $mid $high $val"  . PHP_EOL;

   if ($val == $guess) {
     return $guess;
   } elseif ($guess < $val) {
     $high = $mid -1;
   } else {
     $low = $mid + 1;
   }
 }
 return null;
}

$arr = [1, 2, 3, 4, 5, 6, 7, 8];

$val = binary_search($arr, 1);
var_dump($val);
print 'Found value: ' . $val . PHP_EOL;

$val = binary_search($arr, 3);
var_dump($val);
print 'Found value: ' . $val . PHP_EOL;

$val = binary_search($arr, 4);
print 'Found value: ' . $val . PHP_EOL;

$val = binary_search($arr, 8);
print 'Found value: ' . $val . PHP_EOL;
?>
