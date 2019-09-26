#!/usr/bin/env php
<?php

// Comment/un-comment to test weak/strict parameter type checking
// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once ('./scalar_parameters.php');

$val = addIntegers(4.5, 3.4);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = addFloats(4.5, 3.4);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = upperRev(12345);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = isItTrue(3.6);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;
