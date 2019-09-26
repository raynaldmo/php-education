#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);


function showPercentage($s) {
  $len = strlen(trim($s));
  if (!$len) {
    return 0;
  }
  
  // Get completion char
  $c = $s[0];
  
  // Get not-completed char
  $n = $s[$len - 1];
  
  // Get character counts
  $c_cnt = 0;
  $n_cnt = 0;
  for ($i=0; $i<$len; $i++) {
   if ($s[$i] == $c) {
    $c_cnt++;
   }
   if ($s[$i] == $n) {
    $n_cnt++;
   }
  } 
  
  // Calculate percent completion
  $percent_complete = floor(($c_cnt/$len) * 100);
  
  return $percent_complete;
  
}

$p = showPercentage('XX--');
echo $p . PHP_EOL;
$p = showPercentage('0.....');
echo $p . PHP_EOL;
