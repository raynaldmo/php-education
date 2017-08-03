<?php
// Weakly type-checked parameters

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