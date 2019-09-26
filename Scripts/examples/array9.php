#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$temps = [
78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73
];

// Sort the temperatures
sort($temps, SORT_NUMERIC);
print_r($temps);

// Seven lowest (duplicates)
echo 'Seven lowest (duplicates)' . PHP_EOL;
print_r(array_slice($temps, 0, 7));

// Seven lowest (no duplicates)
echo 'Seven lowest (no - duplicates)' . PHP_EOL;
$n = count($temps);
$lowest[] = $temps[0];

for($i=1; $i<$n; $i++) {
	if ($temps[$i] != $temps[$i-1]) {
    $lowest[] = $temps[$i];
  }
  if (count($lowest) == 7) {
    break;
  }
}

print_r($lowest);

// Seven highest (duplicates)
echo 'Seven highest (duplicates)' . PHP_EOL;
print_r(array_slice($temps, -(count($temps)) , 7));

// Seven highest (no duplicates)
echo 'Seven highest (no - duplicates)' . PHP_EOL;
$n = count($temps);
$highest[] = $temps[$n - 1];

for($i=($n - 2); $i>=0; $i--) {
	if ($temps[$i] != $temps[$i-1]) {
    $highest[] = $temps[$i];
  }
  if (count($highest) == 7) {
    break;
  }
}

$highest = array_reverse($highest);
print_r($highest);
