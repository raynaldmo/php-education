#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);


function sum_digits($num) {
  $num = (int)$num;
  if ($num == 0) {
  	return 0;
  } else {
    return ($num % 10) + sum_digits($num / 10);
  }
}

$sum = sum_digits(591);
echo $sum . PHP_EOL;

