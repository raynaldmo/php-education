#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function sum_array(array $arr) : int {
	if (!count($arr)) {
		return 0;
	}
	$val = array_pop($arr);
	return $val + sum_array($arr);
}

$sum = sum_array([2,4,6]);
echo $sum . PHP_EOL;
