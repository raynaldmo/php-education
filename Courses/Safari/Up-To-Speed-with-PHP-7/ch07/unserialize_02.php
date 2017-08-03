<?php
class Unsafe
{
    public $answer = 42;

    public function __destruct()
    {
        echo "Caught you!<br>";
    }
}

$val = "O%3A6%3A%22Unsafe%22%3A1%3A%7Bs%3A6%3A%22answer%22%3Bi%3A42%3B%7D";

$extract = unserialize(urldecode($val), ['allowed_classes' => false]);
var_dump($extract);