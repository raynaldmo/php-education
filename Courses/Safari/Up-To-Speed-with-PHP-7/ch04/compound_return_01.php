<?php

// Example showing how return type is specified. In this case wordsToUpper
// return array compound type.
function wordsToUpper($string)  : array {
    if (empty($string) || is_null($string)) {
      // Returning a string will cause TypeError exception
      // return '';
      return [];
    }
    $string = explode(' ', $string);
    return array_map('strtoupper', $string);
}

$input = 'one two three';

$converted = wordsToUpper($input);
echo '<pre>';
print_r($converted);
echo '</pre>';

$input = '';

$converted = wordsToUpper($input);
echo '<pre>';
print_r($converted);
echo '</pre>';