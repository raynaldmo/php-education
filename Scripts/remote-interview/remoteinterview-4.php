#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function find_user_events($file, $user_email) {
 $handle = @fopen($file, "r");
 if ($handle) {
  $arr = array();

  while (($buffer = fgets($handle)) !== false) {
    // echo $buffer;
    // Search for user mail in current line
    $needle = "to=<$user_email>";
    if (strpos($buffer, $needle) !== false) {
      $arr[] = $buffer;
    }
  }

  if (!feof($handle)) {
    echo "Error: unexpected fgets() fail\n";
  }

  fclose($handle);
  return $arr;

  } else {
    echo "$file not found\n";
  }
}

// $arr = find_user_events('./missing-file.log', 'john.doe@anc.com');
$arr = find_user_events('./mail.log', 'john.doe@anc.com');
var_export($arr);

