<?php
function wordsToUpper($string) : array {
    if (empty($string) || is_null($string)) {
        return [];
    }
    $string = explode(' ', $string);
    return array_map('strtoupper', $string);
}

$input = '';

$converted = wordsToUpper($input);
echo '<pre>';
print_r($converted);
echo '</pre>';
