#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function generate_permutations($str) {
  $arr = str_split($str);
  $permutations = array();

  foreach ($arr as $key1 => $char1) {
    $arr2 = $arr;
    unset($arr2[$key1]);
    foreach ($arr2 as $key2 => $char2) {
      $arr3 = $arr2;
      unset($arr3[$key2]);
      foreach ($arr3 as $key3 => $char3) {
        $permutations[] = $char1 . $char2 . $char3;
      }
    }
  }
  return $permutations;
}

$p = generate_permutations('abc');
print_r($p);


