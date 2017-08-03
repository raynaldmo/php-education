<?php
declare(strict_types=1);

function roundedAverage(array $values) : int {
    $avg = array_sum($values) / count($values);
    return (int)round($avg);
}

function addIntegers(int $a, int $b) : int {
    return $a + $b;
}