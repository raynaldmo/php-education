<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/4/15
 * Time: 6:41 PM
 */

// Example showing not to quote array key if key is a variable
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors', true);

// Simple array:
$array = array(1, 2);
$count = count($array);

for ($i = 0; $i < $count; $i++) {
  echo "\nChecking $i: \n";
  echo "Bad: " . $array['$i'] . "\n";
  echo "Good: " . $array[$i] . "\n";
  echo "Bad: {$array['$i']}\n";
  echo "Good: {$array[$i]}\n";
}