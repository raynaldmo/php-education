#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

function print_symbol(string $symbol, int $num) {
  for ($i=1; $i<=$num; $i++) {
  	for ($j=0; $j<$i; $j++) {
  		echo $symbol;
  	}
  	echo "\n";
  }
}

// Test it!
print_symbol("*", 5);

