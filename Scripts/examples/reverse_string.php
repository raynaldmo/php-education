#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function reverse_string(string $s) : string {
	if (!$s) {
		return "Empty string";
	}

	// point to start
	$i = 0;

	// point to end of string
	$j = strlen($s) - 1;

	while ($i < $j) {
		// swap characters
		$t = $s[$i];
		$s[$i] = $s[$j];
		$s[$j] = $t;

		// Advance characters
		$i++; $j--;
	}

	return $s;
}

// Test it
echo reverse_string("") . PHP_EOL;
echo reverse_string("abc") . PHP_EOL;



