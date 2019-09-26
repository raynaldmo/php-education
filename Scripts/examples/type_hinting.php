#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

function calcNumMilesOnFullTank(array $models) {
  foreach($models as $item) {
    echo $carModel = $item[0];
    echo " : ";
    echo $numberOfMiles = $item[1] * $item[2];
    echo "\n";
  }
}

$models = array( array('Toyota', 12, 44), array('BMW', 13, 41));

calcNumMilesOnFullTank($models);
calcNumMilesOnFullTank('models');  // fatal error
