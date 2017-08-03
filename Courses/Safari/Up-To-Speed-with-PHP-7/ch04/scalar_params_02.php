<?php
declare(strict_types=1);

require_once './functions/scalar_params_strict.php';

// Included functions use strict type checks for params

echo var_dump(addIntegers(4.5, 3.4)) . '<br>';
//echo var_dump(addIntegers(4, 3)) . '<br>';

echo var_dump(addFloats(5, '3')) . '<br>';
//echo var_dump(addFloats(5.6, 3)) . '<br>';

echo var_dump(upperRev(12345)) . '<br>';
//echo var_dump(upperRev('4 seasons')) . '<br>';

echo var_dump(isItTrue(3.6));
//echo var_dump(isItTrue(false));