#!/usr/bin/env php
<?php

// declare (strict_types = 1)
namespace Test\Introspection;

error_reporting(E_ALL);
ini_set('display_errors', 1);

class ParentClass {
}

class MyClass extends ParentClass {

}

echo \Test\Introspection\ParentClass::class . PHP_EOL;
echo \Test\Introspection\MyClass::class . PHP_EOL;

