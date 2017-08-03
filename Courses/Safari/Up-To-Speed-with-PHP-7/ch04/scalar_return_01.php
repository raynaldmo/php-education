<?php
declare(strict_types=1);

require_once './functions/scalar_return_weak.php';

// Included functions have weakly type-checked return values

$input = 4.5;

echo var_dump(getInteger($input)) . '<br>';

echo var_dump(getFloat($input)) . '<br>';

echo var_dump(getString($input)) . '<br>';

echo var_dump(getBoolean($input));