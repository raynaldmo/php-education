#!/usr/bin/env php
<?php

// In this test we are only testing return type checking
// Specifying strict type or not doesn't affect the test results
declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

// un-comment to test weak mode
require_once ('./scalar_return_type_weak.php');

//  un-comment to test strict mode
// require_once ('./scalar_return_type_strict.php');

$val = getInteger(4.5);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = getFloat(4.5);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = getString(4.5);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;

$val = getBoolean(4.5);
echo "\$val = $val " . 'type = ' . gettype($val) . PHP_EOL;