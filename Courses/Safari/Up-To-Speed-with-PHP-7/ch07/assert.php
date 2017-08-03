<?php

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

dealCard('tuxedo');

