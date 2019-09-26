<?php

// With parameter type hinting strict/weak mode declaration takes effect in
// file that makes function call
declare(strict_types=1);

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

