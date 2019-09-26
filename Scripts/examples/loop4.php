#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

$x = 0;
for ($i=1; $i<=10; $i++) {
	if ($i<6) {
		for ($j=0; $j<$i; $j++){
			echo "*";
		}
		echo "\n";
	} else {
    for ($j=0; $j < ($i - (2*$x +1)); $j++) {
    	echo "*";
    }
    echo "\n";
    $x++;
  }
}



