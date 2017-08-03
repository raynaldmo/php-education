<?php
// Turn on strict mode
declare(strict_types=1);

// Strictly type-checked parameters, or are they?

function addIntegers(int $a, int $b) {
    return $a + $b;
}

function addFloats(float $a, float $b) {
    return $a + $b;
}

function upperRev(string $a) {
    return strtoupper(strrev($a));
}

function isItTrue(bool $a) {
    return $a ? 'true' : 'false';
}