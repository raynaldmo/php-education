<?php
function generator1() {
    yield 1;
    $g2 = yield from generator2();
    yield 7;
    return $g2;
}

function generator2() {
    yield 2;
    yield from [3, 4, 5];
    yield 6;
    return 'This came from generator2';
}

$gen = generator1();

foreach ($gen as $yielded) {
    echo $yielded . '<br>';
}

echo $gen->getReturn();