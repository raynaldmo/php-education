<?php
// Type checking of params depends on calling file
// Return values will be cast to the specified type

function addIntegers(int $a, int $b) : string {
    return $a + $b;
}

function addFloats(float $a, float $b) : int {
    return $a + $b;
}

function upperRev(string $a) : float {
    return strtoupper(strrev($a));
}

function isItTrue(bool $a) : bool {
    return $a ? 'true' : 'false';
}

/*function addIntegers(int $a, int $b) : int {
    return $a + $b;
}

function addFloats(float $a, float $b) : float {
    return $a + $b;
}

function upperRev(string $a) : string {
    return strtoupper(strrev($a));
}

function isItTrue(bool $a) : string {
    return $a ? 'true' : 'false';
}*/
