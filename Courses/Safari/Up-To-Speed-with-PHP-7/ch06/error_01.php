<?php
class Lock
{
    public function __construct()
    {
        echo 'Lock acquired<br>';
    }

    public function __destruct()
    {
        echo 'Lock released by destructor';
    }
}

function crash($obj) {
    $obj->someMethod();
}

try {
    $lock = new Lock();
    crash(null);
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
} finally {
    echo 'Finally block called<br>';
}