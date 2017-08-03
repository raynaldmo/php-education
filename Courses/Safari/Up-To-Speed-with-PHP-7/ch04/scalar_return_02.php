<?php
//declare(strict_types=1);

require_once './functions/scalar_return_strict.php';

// Included functions have strictly type-checked return values

$input = 4;

echo var_dump(getInteger($input)) . '<br>';

//$input = 4.5;
echo var_dump(getFloat($input)) . '<br>';

$input = '4 seasons';
echo var_dump(getString($input)) . '<br>';

// $input = false;
echo var_dump(getBoolean($input));