<?php
ini_set('zend.assertions', '1');
ini_set('assert.exception', '1');


function dealCard($suit) {
    switch(strtolower($suit)) {
        case 'clubs':
        case 'diamonds':
        case 'hearts':
        case 'spades':
            echo "Dealing a card from $suit";
            break;
        default:
            assert(false, 'No such suit');
    }
}

try {
    dealCard('tuxedo');
} catch (Error $e) {
    echo $e->getMessage() . '<br>' . $e->getTraceAsString();
}

