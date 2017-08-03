<?php
function gen() {
    $total = 0;
    for ($i = 1; $i <= 10; $i++) {
        yield $i;
        $total += $i;
    }
    return $total;
}

$counter = gen();

foreach ($counter as $num) {
    echo $num . '<br>';
}

//echo 'Total: ' . $counter->getReturn();
