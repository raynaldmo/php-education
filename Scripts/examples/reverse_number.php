#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);


function reverse_number(int $num) : int {
	$n = 0;
	while($num > 0) {
		// echo "$num\n";

		// Get remainder
		$r = $num % 10;
		$n = $n * 10 + $r;
		$num = (int)($num/10);
	}
	return $n;
}

// Test it
$num = reverse_number(3);
echo "$num\n";

$num = reverse_number(123);
echo "$num\n";
