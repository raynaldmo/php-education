#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Find smallest integer in an array
function find_smallest(array $arr) : int {
  $smallest = $arr[0];
  $smallest_idx = 0;
  foreach ($arr as $idx => $val) {
  	if ($val < $smallest) {
  		$smallest = $val;
  		$smallest_idx = $idx;
  	}
  }
  return $smallest_idx;
}

// Implement selection sort
function selection_sort(array $arr) : array {
	$sorted = [];
	while(count($arr) > 0) {
		$idx = find_smallest($arr);
		$sorted[] = $arr[$idx];
		// Remove smallest element from array
		unset($arr[$idx]);
		// This statement is important as it re-indexes array to start at 0
		$arr = array_values($arr);
	}
	return $sorted;
}

// Test find_smallest()
$arr = array(10,2,4,3,1,40);
$smallest_idx = find_smallest($arr);
echo $smallest_idx . '/' . $arr[$smallest_idx] . PHP_EOL;

// Test selection sort
$sorted = selection_sort($arr);
var_export($arr);
var_export($sorted);



