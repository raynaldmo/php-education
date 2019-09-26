#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function factorial (int $n) : int {
	$p = 1;
	for ($i=1; $i<=$n; $i++) {
		$p *= $i;
	}
	return $p;
}

// Test it
echo factorial(0) . PHP_EOL;
echo factorial(1) . PHP_EOL;
echo factorial(2) . PHP_EOL;
echo factorial(3) . PHP_EOL;
echo factorial(4) . PHP_EOL;

