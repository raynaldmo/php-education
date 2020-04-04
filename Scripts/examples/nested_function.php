#!/usr/bin/env php
<?php

// skeleton for php CLI scripts
// This script can be run several different ways
// 1. ./skeleton.php
// 2. php -f skeleton.php
// 3. php skeleton.php

// Before running do a syntax check
// php -l skeletion.php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

function F() {
    echo "This is function F()\n";
    function F1() {
        echo "This is function F1()\n";
    }
    F1();
}

F();

