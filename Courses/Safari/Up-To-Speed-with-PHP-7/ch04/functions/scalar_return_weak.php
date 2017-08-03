<?php
// Weakly type-checked return values
// In weak mode, the return value is cast to the specified type

function getInteger($input) : int {
    return $input;
}

function getFloat($input) : float {
    return $input;
}

function getString($input) : string {
    return $input;
}

function getBoolean($input) : bool {
    return $input;
}
